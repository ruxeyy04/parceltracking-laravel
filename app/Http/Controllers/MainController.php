<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parcel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TrackingDetail;
use Illuminate\Support\Facades\Hash;
use App\Models\ParcelTrackDescription;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function homepage()
    {
        return view('index');
    }
    public function homeparceltracking(Parcel $parcel)
    {
        $parcel = $parcel->load('parcelTrackDescription');
        return view('trackedparcel', compact('parcel'));
    }
    public function track()
    {
        return view('client.Track');
    }
    public function tracked(Parcel $parcel)
    {
        $parcel = $parcel->load('parcelTrackDescription');
        return view('client.Tracked', compact('parcel'));
    }
    public function logs()
    {
        $account_id = request()->cookie('userid');

        $parcels = Parcel::where('userid', $account_id)->get();

        return view('client.Logs', compact('parcels'));
    }
    public function prof()
    {
        $account_id = request()->cookie('userid');
        $userinfo = User::where('userid', $account_id)->first();
        return view('client.Prof', compact('userinfo'));
    }
    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'gender' => 'required|string|in:Male,Female,Other',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ]);

        // Create a new user using the provided payload
        $user = User::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'usertype' => $request->input('usertype') ? $request->input('usertype') : 'client'
        ]);

        $token = $user->createToken('registration_token')->plainTextToken;

        // You can customize the response based on your needs
        return response()->json(['status' => 'success', 'message' => 'User registered successfully', 'token' => $token], 201);
    }
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email_username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->input('email_username'))
            ->orWhere('username', $request->input('email_username'))
            ->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            $minutes = 60;
            $token = $user->createToken('API-TOKEN')->plainTextToken;
            $cookie1 = Cookie::make('userid', $user->userid, $minutes);
            $cookie2 = Cookie::make('usertype', $user->usertype, $minutes);
            $cookie3 = Cookie::make('bearer_token', $token, $minutes);
            return response()->json(['status' => 'success', 'message' => 'Login successful', 'token' => $token], 200)
                ->withCookie($cookie1)
                ->withCookie($cookie2)
                ->withCookie($cookie3);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
        }
    }
    // incharge
    public function inchargeindex() {
        return view('incharge.index');
    }
    public function inchargeparcel() {
        $parcels = Parcel::all();
        $trackingdetails = TrackingDetail::all();
        $user = User::where('usertype', 'client')->get();
        $parcels = $parcels->load('parcelTrackDescription');
        return view('incharge.parcel', compact('parcels', 'trackingdetails', 'user'));
    }
    public function inchargeprofile() {
        $account_id = request()->cookie('userid');
        $userinfo = User::where('userid', $account_id)->first();
        return view('incharge.profile', compact('userinfo'));
    }
    public function inchargetracked(Parcel $parcel)
    {
        $parcel = $parcel->load('parcelTrackDescription');
        return view('incharge.Tracked', compact('parcel'));
    }
    // end incharge
    // admin pages
    public function adminindex() {
        return view('admin.index');
    }
    public function adminparcel() {
        $parcels = Parcel::all();
        $trackingdetails = TrackingDetail::all();
        $user = User::where('usertype', 'client')->get();
        $parcels = $parcels->load('parcelTrackDescription');
        return view('admin.parcel', compact('parcels', 'trackingdetails', 'user'));
    }
    public function adminprofile() {
        $account_id = request()->cookie('userid');
        $userinfo = User::where('userid', $account_id)->first();
        return view('admin.profile', compact('userinfo'));
    }
    public function adminadduser() {
        $user = User::all();
        return view('admin.users', compact('user'));
    }
    public function admintracked (Parcel $parcel) 
    {
        $parcel = $parcel->load('parcelTrackDescription');
        return view('admin.Tracked', compact('parcel'));
    }
    public function logout()
    {
        try {
            $user = User::where('userid', request()->cookie('userid'))->first();

            if ($user) {
                $user->tokens()->where('name', 'API-TOKEN')->delete(); // Remove the token
            }

            // Remove cookies
            Cookie::queue(Cookie::forget('userid'));
            Cookie::queue(Cookie::forget('usertype'));
            Cookie::queue(Cookie::forget('bearer_token'));

            return response()->json(['success' => true, 'message' => 'Logout successful']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to logout. Error: ' . $e->getMessage()]);
        }
    }

    public function editprofile(Request $request)
    {
        $userid = request()->cookie('userid');
    
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $userid . ',userid',
            'gender' => 'required|string|in:Male,Female',
            'email' => 'required|email|unique:users,email,' . $userid . ',userid',
            'newpass' => 'nullable|string|min:4',
        ]);
    
        $user = User::find($userid);
    
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    
        // Get the user's current attributes before the update
        $oldAttributes = $user->getAttributes();
    
        $userChanges = [
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
        ];
    
        $userChanges = array_filter($userChanges, function ($value) {
            return $value !== null;
        });
    
        if (!empty($userChanges)) {
            $user->update($userChanges);
    
            if ($request->filled('newpass')) {
                $user->update([
                    'password' => Hash::make($request->input('newpass')),
                ]);
            }
    
            $newAttributes = $user->fresh()->getAttributes();
    
            if ($oldAttributes === $newAttributes) {
                // No changes made
                return response()->json(['status' => 'info', 'message' => 'No changes made to the profile'], 200);
            } else {
                // Changes made
                return response()->json(['status' => 'success', 'message' => 'Profile updated successfully'], 200);
            }
        } else {
            return response()->json(['status' => 'info', 'message' => 'No changes made to the profile'], 200);
        }
    }
    public function addparcelData(Request $request)
    {
        $request->validate([
            'sender' => 'required|string|max:255',
            'userid' => 'required|exists:users,userid', 
            'paymentmethod' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'tracking_info_id' => 'nullable|exists:tracking_details,tracking_info_id', 
            'contact_num' => 'required|string',
            'address' => 'required|string',
        ]);
        $randomNumber = rand(1000000, 9999999);
        // Create Parcel
        $parcel = Parcel::create([
            'parcel_id' => $randomNumber,
            'userid' => $request->input('userid'),
            'sender' => $request->input('sender'),
            'payment_method' => $request->input('paymentmethod'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'contact_num' => $request->input('contact_num'),
            'address' => $request->input('address'),
        ]);
    
        // Attach Tracking Info if provided
        if ($request->filled('tracking_info_id')) {
            $parcel->parcelTrackDescription()->create([
                'tracking_info_id' => $request->input('tracking_info_id'),
            ]);
        }
    
        return response()->json(['status' => 'success', 'message' => 'Parcel added successfully'], 200);
    }
    public function deleteParcel(Request $request)
    {
        $request->validate([
            'parcel_id' => 'required|exists:parcels,parcel_id',
        ]);
    
        $parcel = Parcel::find($request->input('parcel_id'));
    
        if (!$parcel) {
            return response()->json(['status' => 'error', 'message' => 'Parcel not found'], 404);
        }
    
        $parcel->delete();
    
        return response()->json(['status' => 'success', 'message' => 'Parcel deleted successfully'], 200);
    }
    public function editParcel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parcel_id' => 'required|exists:parcels,parcel_id',
            'sender' => 'required|string|max:255',
            'userid' => 'required|exists:users,userid',
            'paymentmethod' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'tracking_info_ids' => 'nullable|array',
            'tracking_info_ids.*' => 'exists:tracking_details,tracking_info_id',
            'contact_num' => 'required|string',
            'address' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
    
        $parcel = Parcel::find($request->input('parcel_id'));
    
        if (!$parcel) {
            return response()->json(['status' => 'error', 'message' => 'Parcel not found'], 404);
        }
    
        $parcelChanges = [
            'sender' => $request->input('sender'),
            'userid' => $request->input('userid'),
            'payment_method' => $request->input('paymentmethod'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'contact_num' => $request->input('contact_num'),
            'address' => $request->input('address'),
        ];
    
        $existingParcelAttributes = $parcel->only(array_keys($parcelChanges));
    
        if ($parcelChanges !== $existingParcelAttributes) {
            $parcel->update($parcelChanges);
        }
    
        if ($request->filled('tracking_info_ids')) {
            $existingTrackingIds = $parcel->parcelTrackDescription()->pluck('tracking_info_id')->toArray();
    
            $removedTrackingIds = array_diff($existingTrackingIds, $request->input('tracking_info_ids'));
            ParcelTrackDescription::whereIn('tracking_info_id', $removedTrackingIds)->delete();
    
            $newTrackingIds = array_diff($request->input('tracking_info_ids'), $existingTrackingIds);
            foreach ($newTrackingIds as $trackingId) {
                $parcel->parcelTrackDescription()->create(['tracking_info_id' => $trackingId]);
            }
        }
    
        return response()->json(['status' => 'success', 'message' => 'Parcel updated successfully'], 200);
    }
    public function adduser(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'gender' => 'required|string|in:Male,Female',
            'usertype' => 'required|string|in:client,incharge,admin',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ]);

        // Create a new user using the provided payload
        $user = User::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'usertype' => $request->input('usertype') ? $request->input('usertype') : 'client'
        ]);

        // You can customize the response based on your needs
        return response()->json(['status' => 'success', 'message' => 'User added successfully'], 201);
    }
    public function edituser(Request $request)
    {
        $userid = $request->input('userid');
    
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $userid . ',userid',
            'gender' => 'required|string|in:Male,Female',
            'usertype' => 'required|string|in:client,incharge,admin',
            'email' => 'required|email|unique:users,email,' . $userid . ',userid',
            'newpass' => 'nullable|string|min:4',
        ]);
    
        $user = User::find($userid);
    
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    
        // Get the user's current attributes before the update
        $oldAttributes = $user->getAttributes();
    
        $userChanges = [
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'usertype' => $request->input('usertype'),
        ];
    
        $userChanges = array_filter($userChanges, function ($value) {
            return $value !== null;
        });
    
        if (!empty($userChanges)) {
            $user->update($userChanges);
    
            if ($request->filled('newpass')) {
                $user->update([
                    'password' => Hash::make($request->input('newpass')),
                ]);
            }
    
            $newAttributes = $user->fresh()->getAttributes();
    
            if ($oldAttributes === $newAttributes) {
                // No changes made
                return response()->json(['status' => 'info', 'message' => 'No changes made to the user'], 200);
            } else {
                // Changes made
                return response()->json(['status' => 'success', 'message' => 'User updated successfully'], 200);
            }
        } else {
            return response()->json(['status' => 'info', 'message' => 'No changes made to the user'], 200);
        }
    }
    public function deleteuser(Request $request)
    {
        $request->validate([
            'userid' => 'required|exists:users,userid',
        ]);
    
        $user = User::find($request->input('userid'));
    
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    
        $user->delete();
    
        return response()->json(['status' => 'success', 'message' => 'User deleted successfully'], 200);
    }
}

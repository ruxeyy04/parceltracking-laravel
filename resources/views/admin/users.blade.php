<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <title>PTracker</title>
</head>

<body>
    @include('admin.navbar')
    <div class="red"></div>
    <div class="content container mt-4">
        <h6>// Parcel List</h6>
        <div class="col-sm-12 d-flex justify-content-center align-items-center m-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#adduserdata">Add User</button>
        </div>
        <table id="dataParcel" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>User#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                    <tr>
                        <td>{{ $users->userid }}</td>
                        <td>{{ $users->fname }}</td>
                        <td>{{ $users->lname }}</td>
                        <td>{{ $users->gender }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->username }}</td>
                        <td>{{ ucfirst($users->usertype) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#edituserdata{{ $users->userid }}">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteuserData{{ $users->userid }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="red mt-5"></div>
    <!-- Modal Add User-->
    <div class="modal fade" id="adduserdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adduser">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input class="form-control" placeholder="Enter first name" name="fname" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last name</label>
                            <input class="form-control" placeholder="Enter last name" name="lname" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input class="form-control" placeholder="Enter username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="select">Gender</label>
                            <select class="form-control" id="select" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectt">User Type</label>
                            <select class="form-control" id="selectt" name="usertype">
                                <option value="client">Client</option>
                                <option value="incharge">In-charge</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($user as $userinfo)
    <!-- Modal edit User-->
    <div class="modal fade" id="edituserdata{{ $userinfo->userid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="edituser">
                    <input type="hidden" name="userid" value="{{$userinfo->userid}}">
                    <div class="modal-body">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">First name</label>
                                <input class="form-control" name="fname" placeholder="Enter fname"
                                    value="{{ $userinfo->fname }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input class="form-control" name="lname" placeholder="Enter lname"
                                    value="{{ $userinfo->lname }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input class="form-control" name="username" placeholder="Enter username"
                                    value="{{ $userinfo->username }}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                    <option value="Male" @if ($userinfo->gender == 'Male') selected @endif>Male
                                    </option>
                                    <option value="Female" @if ($userinfo->gender == 'Female') selected @endif>Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect11">User Type</label>
                                <select class="form-control" id="exampleFormControlSelect11" name="usertype">
                                    <option value="client" @if ($userinfo->usertype == 'client') selected @endif>Client
                                    </option>
                                    <option value="incharge" @if ($userinfo->usertype == 'incharge') selected @endif>In-charge
                                    </option>
                                    <option value="admin" @if ($userinfo->usertype == 'admin') selected @endif>Admin
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emaill">Email address</label>
                                <input type="email" class="form-control" id="emaill" placeholder="Enter email" name="email"
                                    value="{{ $userinfo->email }}" />
                            </div>
                            <div class="form-group">
                                <label for="passss">New Password</label>
                                <input type="password" class="form-control" id="passss" placeholder="New Password"
                                    name="newpass" />
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($user as $users)
        <!-- Modal delete user data-->
        <div class="modal fade" id="deleteuserData{{ $users->userid }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteParcelDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteParcelDataLabel">Delete User Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="deleteUserForm">
                        @csrf
                        <input type="hidden" name="userid" value="{{ $users->userid }}">
                        <div class="modal-body">
                            <p>Are you sure you want to delete this userid {{ $users->userid }}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-danger">Delete User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal logout-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <small>
                        Are you sure you want to logout?
                    </small>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        No
                    </button>
                    <button type="button" class="btn btn-danger" id="logout-btn">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#dataParcel');

        $('#adduser').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('adduser') }}",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                        }).then((result) => {
                            // You can redirect or perform other actions after success
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        });
                    } else if (response.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle validation errors or other errors
                    if (xhr.responseJSON.errors) {
                        let errorsHtml = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorsHtml += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: `<ul>${errorsHtml}</ul>`,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    }
                }
            });
        });
        $('.deleteUserForm').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('deleteuser') }}",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: res.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else if (res.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: res.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle validation errors or other errors
                    if (xhr.responseJSON.errors) {
                        let errorsHtml = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorsHtml += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: `<ul>${errorsHtml}</ul>`,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    }
                }
            });
        });
        $('.edituser').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('edituser') }}",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                        }).then((result) => {
                            // You can redirect or perform other actions after success
                            if (result.isConfirmed) {
                                window.location.reload()
                            }
                        });
                    } else if (response.status === 'info') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle validation errors or other errors
                    if (xhr.responseJSON.errors) {
                        let errorsHtml = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorsHtml += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: `<ul>${errorsHtml}</ul>`,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>

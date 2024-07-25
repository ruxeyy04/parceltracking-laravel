<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcel_id',
        'status',
        'userid',
        'sender',
        'amount',
        'contact_num',
        'payment_method',
        'address'
    ];
    public $timestamps = true;
    protected $primaryKey = 'parcel_id';

    public function parcelTrackDescription()
    {
        return $this->hasMany(ParcelTrackDescription::class, 'parcel_id', 'parcel_id')->latest('created_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    }
}

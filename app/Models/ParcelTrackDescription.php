<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelTrackDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcel_id',
        'tracking_info_id'
    ];
    public $timestamps = true;
    protected $primaryKey = 'parcel_track_id';

    public function parcel()
    {
        return $this->belongsTo(Parcel::class, 'parcel_track_id', 'parcel_track_id');
    }
    public function trackingdetail()
    {
        return $this->belongsTo(TrackingDetail::class, 'tracking_info_id', 'tracking_info_id');
    }
}

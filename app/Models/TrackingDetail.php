<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'details'
    ];
    public $timestamps = true;
    protected $primaryKey = 'tracking_info_id';
}

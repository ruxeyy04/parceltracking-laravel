<?php

use App\Models\TrackingDetail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tracking_details', function (Blueprint $table) {
            $table->id('tracking_info_id');
            $table->string('details');
            $table->timestamps();
        });
        TrackingDetail::insert([
            [
                'tracking_info_id' => 1,
                'details' => 'Order is placed',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tracking_info_id' => 2,
                'details' => 'Seller is preparing to ship your parcel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tracking_info_id' => 3,
                'details' => 'Parcel has arrived at sorting faciliy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tracking_info_id' => 4,
                'details' => 'Parcel has departed from sorting facility',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tracking_info_id' => 5,
                'details' => 'Parcel has arrived and to be received by the delivery hub',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tracking_info_id' => 6,
                'details' => 'Parcel is out for delivery',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tracking_info_id' => 7,
                'details' => 'Parcel has been delivered',
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_details');
    }
};

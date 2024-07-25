<?php

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
        Schema::create('parcel_track_descriptions', function (Blueprint $table) {
            $table->increments('parcel_track_id');
            $table->unsignedBigInteger('parcel_id');
            $table->unsignedBigInteger('tracking_info_id');
            $table->foreign('parcel_id')->references('parcel_id')->on('parcels')->onDelete('cascade');
            $table->foreign('tracking_info_id')->references('tracking_info_id')->on('tracking_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcel_track_descriptions');
    }
};

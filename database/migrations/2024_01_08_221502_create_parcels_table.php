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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id('parcel_id');
            $table->string('sender');
            $table->decimal('amount', 10, 2);
            $table->string('contact_num');
            $table->string('payment_method');
            $table->string('address');
            $table->string('status');
            $table->unsignedInteger('userid');
            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};

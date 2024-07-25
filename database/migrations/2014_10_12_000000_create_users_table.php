<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('usertype');
            $table->timestamps();
        });

        User::insert([
            [
                'fname'=> 'Juan',
                'lname' => 'Cruz',
                'gender'=> 'Male',
                'email'=>'client@gmail.com',
                'username' => 'client',
                'password' => Hash::make('1234'),
                'usertype' => 'client',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fname'=> 'Jonathan',
                'lname' => 'Pena',
                'gender'=> 'Male',
                'email'=>'incharge@gmail.com',
                'username' => 'incharge',
                'password' => Hash::make('1234'),
                'usertype' => 'incharge',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fname'=> 'Than',
                'lname' => 'Dela',
                'gender'=> 'Male',
                'email'=>'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('1234'),
                'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('no_bpjs')->nullable();
            $table->string('no_medical_records')->nullable();
            $table->string('name');
            $table->enum('gender',['male','female']);
            $table->date('birth_date');
            $table->text('address');
            $table->enum('category',['new', 'old', 'rm', 'pharmacist', 'doctor', 'anesthesia', 'staff']);
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

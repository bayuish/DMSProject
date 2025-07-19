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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('email');
            $table->string('profile_photo_path', 2048)->nullable()->after('phone_number');
            $table->string('avatar_url')->nullable()->after('profile_photo_path'); // Untuk menyimpan URL foto yang dapat diakses publik
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'profile_photo_path', 'avatar_url']);
        });
    }
};
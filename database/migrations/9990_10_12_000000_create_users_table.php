<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('uid')->primary();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->timestamps();
            $table->rememberToken();

            $table->foreign('role_id')->references('id')->on('user_types')->onDelete('set null');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

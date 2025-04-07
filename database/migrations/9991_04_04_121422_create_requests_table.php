<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->datetime('date');
            $table->unsignedInteger('passenger_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedBigInteger('origin')->nullable();
            $table->unsignedBigInteger('destination')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();

            $table->foreign('passenger_id')->references('uid')->on('users')->onDelete('set null');
            $table->foreign('driver_id')->references('uid')->on('users')->onDelete('set null');
            $table->foreign('origin')->references('id')->on('neighborhoods')->onDelete('set null');
            $table->foreign('destination')->references('id')->on('neighborhoods')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
        });
    }

    public function down(): void{
        Schema::dropIfExists('requests');
    }
};
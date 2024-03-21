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
        Schema::create('api_points_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('api_point_id');
            $table->unsignedSmallInteger('status_code');
            $table->unsignedFloat('response_time');
            $table->timestamps();

            $table->foreign('api_point_id')->references('id')->on('api_points')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_points_history');
    }
};

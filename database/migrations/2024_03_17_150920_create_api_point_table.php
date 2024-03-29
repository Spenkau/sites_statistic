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
        Schema::create('api_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->text('request_data');
            $table->mediumText('response_data');
            $table->string('service');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_point');
    }
};

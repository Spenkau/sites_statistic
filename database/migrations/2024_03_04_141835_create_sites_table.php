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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->unsignedInteger('threshold_speed');
            $table->unsignedBigInteger('detail_id');
            $table->unsignedBigInteger('site_id');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('details')->onDelete('cascade');

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};

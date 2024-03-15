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
        Schema::table('site_user', function (Blueprint $table) {
            $table->boolean('telegram_channel')->default(false);
            $table->boolean('whatsapp_channel')->default(false);
            $table->boolean('sms_channel')->default(false);
            $table->boolean('email_channel')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_user', function (Blueprint $table) {
            $table->removeColumn('telegram_channel');
            $table->removeColumn('whatsapp_channel');
            $table->removeColumn('sms_channel');
            $table->removeColumn('email_channel');
        });
    }
};

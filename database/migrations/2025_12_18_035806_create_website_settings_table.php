<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Hop & Go Cars');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('primary_color')->default('#8DB9E8');
            $table->string('bg_color')->default('#F4E8D7');
            $table->string('accent_color')->default('#EFA892');
            $table->string('alert_color')->default('#E90A0A');
            $table->text('footer_text');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->json('social_media')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
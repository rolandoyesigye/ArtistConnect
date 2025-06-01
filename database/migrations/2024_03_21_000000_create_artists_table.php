<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('stage_name');
            $table->string('gender');
            $table->string('nationality');
            $table->text('address');
            $table->string('NIN_number')->unique();
            $table->string('NIN_front_image');
            $table->string('NIN_back_image');
            $table->text('bio');
            $table->string('profile_photo');
            $table->text('social_media_link')->nullable();
            $table->text('music_links')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
}; 
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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name');
            $table->string('phone_1')->unique();
            $table->string('phone_2')->unique()->nullable();
            $table->string('phone_3')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('corporate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};

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
        Schema::create('material_order_list_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_order_list_id')->constrained('material_order_lists');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('title');
            $table->longText('desc')->nullable();
            $table->timestamps();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_order_list_histories');
    }
};

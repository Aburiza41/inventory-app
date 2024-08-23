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
        Schema::create('material_order_lists', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('material_order_id')->constrained('material_orders');
            $table->foreignId('project_material_list_id')->constrained('project_material_lists');
            // $table->foreignId('material_id')->constrained('materials');
            // $table->string('code')->unique();
            $table->string('brand')->nullable();
            // $table->string('brand_description')->nullable();
            // $table->decimal('length', 65, 5)->nullable(); // Panjang
            // $table->decimal('width', 65, 5)->nullable(); // Lrbar
            // $table->decimal('thick', 65, 5)->nullable(); // Tebal
            // $table->decimal('weight', 65, 5)->nullable(); // Berat

            $table->decimal('price', 65, 0)->nullable(); // Jumlah Beli
            $table->decimal('discount', 65, 0)->nullable(); // Jumlah Beli
            // $table->decimal('buy_quantity', 65, 5)->nullable(); // Jumlah Beli
            // $table->decimal('current_quantity', 65, 5)->nullable(); // Jumlah Saat Ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_order_lists');
    }
};

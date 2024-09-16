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
        Schema::create('project_material_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('material_id')->constrained('materials');
            $table->string('uuid')->unique();
            $table->string('unit')->nullable();
            $table->decimal('quantity', 65, 0)->nullable(); // Jumlah Beli
            $table->decimal('price', 65, 0)->nullable(); // Jumlah Beli
            $table->enum('status', ['PO', 'Dibeli', 'Dibatalkan'])->default('PO');
            $table->longText('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_material_lists');
    }
};

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
        Schema::create('material_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->string('uuid')->unique();
            $table->string('image')->nullable();
            // $table->text('description')->nullable();
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');

            // Buyer
            $table->string('buyer_name');
            $table->string('buyer_phone');
            $table->string('buyer_address')->nullable();
            $table->string('buyer_corporate')->nullable();

            $table->string('buyer_number_invoice')->unique();

            // Date
            $table->date('purchase_date');
            $table->date('due_date')->nullable();

            // Payment
            $table->decimal('purchase_payment', 65, 5);
            $table->decimal('purchase_price', 65, 5);
            $table->decimal('purchase_current', 65, 5)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_orders');
    }
};

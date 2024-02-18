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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sales_id');
            $table->foreignId('seller_id')->constrained('sellers', 'id', 'seller_id')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('sale_value', $precision = 8, $scale = 2);
            $table->decimal('sale_commission', $precision = 8, $scale = 2);
            $table->date('created_at');
            $table->date('updated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

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
        Schema::create('Payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->unsignedBigInteger('id_orderDetail');
            $table->timestamps();
            $table->foreign('id_orderDetail')->references('id_orderDetail')->on('orderDetails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Payments');
    }
};

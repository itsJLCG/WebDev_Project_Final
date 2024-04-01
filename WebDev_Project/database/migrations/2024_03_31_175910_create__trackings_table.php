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
        Schema::create('Trackings', function (Blueprint $table) {
            $table->id('id_tracking');
            $table->unsignedBigInteger('id_payment');
            $table->string('trackingStatus');
            $table->timestamps();
            $table->foreign('id_payment')->references('id_payment')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Trackings');
    }
};

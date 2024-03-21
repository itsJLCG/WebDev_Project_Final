<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('moneydonations', function (Blueprint $table) {
            $table->date('MoneyDateOffered')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moneydonations', function (Blueprint $table) {
            $table->dropColumn('MoneyDateOffered');
        });
    }
};

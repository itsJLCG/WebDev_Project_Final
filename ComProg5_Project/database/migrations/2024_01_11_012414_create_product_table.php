<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    public function up()
    {
        Schema::create('product_table', function (Blueprint $table) {
            $table->id('Product_Id');
            $table->string('Product_Name');
            $table->decimal('Product_Price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_table');
    }
}

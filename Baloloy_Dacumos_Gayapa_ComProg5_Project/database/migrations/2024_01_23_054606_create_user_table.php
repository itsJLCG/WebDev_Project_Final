<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('UserTable', function (Blueprint $table) {
            $table->bigIncrements('UserID');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Address');
            $table->string('ContactNumber');
            $table->string('Passcode');
            $table->string('UserImage');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('UserTable');
    }
}
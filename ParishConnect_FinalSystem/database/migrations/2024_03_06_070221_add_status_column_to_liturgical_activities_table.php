<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnToLiturgicalActivitiesTable extends Migration
{
    public function up()
    {
        Schema::table('liturgicalactivities', function (Blueprint $table) {
            $table->string('activityStatus')->default('Pending');
        });
    }

    public function down()
    {
        Schema::table('liturgicalactivities', function (Blueprint $table) {
            $table->dropColumn('activityStatus');
        });
    }
}


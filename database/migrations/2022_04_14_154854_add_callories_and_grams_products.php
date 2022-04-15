<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCalloriesAndGramsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_menu', function (Blueprint $table) {
            $table->float('grams')->after('description');
            $table->float('calories')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_menu', function(Blueprint $table) {
            $table->dropColumn('grams');
            $table->dropColumn('calories');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultUserIdToOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->integer('user_id')->default(0)->change(); 
        });
    }

    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->change(); 
        });
    }

}

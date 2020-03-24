<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('left_paid');
            $table->integer('right_paid');
            $table->integer('left_free');
            $table->integer('right_free');
            $table->integer('left_bv');
            $table->integer('right_bv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_extras');
    }
}

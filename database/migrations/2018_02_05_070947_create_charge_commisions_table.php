<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeCommisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_commisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transfer_charge');
            $table->string('withdraw_charge');
            $table->string('update_charge');
            $table->string('update_commision_tree');
            $table->string('update_commision_sponsor');
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
        Schema::dropIfExists('charge_commisions');
    }
}

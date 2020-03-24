<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawTrasectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_trasections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('withdraw_id');
            $table->string('user_id');
            $table->string('amount');
            $table->string('charge');
            $table->string('method_name');
            $table->string('processing_time');
            $table->longText('detail')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('withdraw_trasections');
    }
}

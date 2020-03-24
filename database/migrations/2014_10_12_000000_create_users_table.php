<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referrer_id');
            $table->string('username')->unique();
            $table->string('password');

            $table->string('position');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('balance')->nullable();

            $table->string('join_date');
            $table->string('status');
            $table->string('paid_status')->nullable();
            $table->string('trans_pin')->nullable();
            $table->string('ver_status')->nullable();
            $table->string('ver_code')->nullable();
            $table->string('forget_code')->nullable();

            $table->date('birth_day');

            $table->string('email')->unique();
            $table->string('mobile');

            $table->string('street_address');
            $table->string('city');
            $table->string('country');
            $table->string('post_code');
            $table->string('affiliate_id');
            $table->integer('package_id');
            $table->date('expiry_date');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
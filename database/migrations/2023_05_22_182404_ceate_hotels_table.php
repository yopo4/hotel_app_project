<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->integer('stars');
            $table->timestamps();
            // $table->id();
            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('owner_id')->references('id')->on('users');
            // $table->string('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};

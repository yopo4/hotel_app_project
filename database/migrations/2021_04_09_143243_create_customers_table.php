<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->enum('gender',['Male', 'Female']);
            $table->string('job');
            $table->date('birthdate');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('customers');
    }
}

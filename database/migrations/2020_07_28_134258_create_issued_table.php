<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issued', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('books_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('books_id')
            ->references('id')->on('books');
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->date('created_at');
            $table->date('return_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issued');
    }
}

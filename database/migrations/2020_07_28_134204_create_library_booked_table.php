<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryBookedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('books_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('books_id')
            ->references('id')->on('books');
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->date('created_at');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booked');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('publishing_id');
            $table->unsignedBigInteger('author_id');
            $table->enum('status',['0','1','2'])->default(0);
            $table->foreign('genre_id')
            ->references('id')->on('genre')
            ->onDelete('cascade');
            $table->foreign('publishing_id')
            ->references('id')->on('publishing')
            ->onDelete('cascade');
            $table->foreign('author_id')
            ->references('id')->on('author')
            ->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('title');
            $table->string('titleKana');
            $table->string('subTitle');
            $table->string('subTitleKana');
            $table->string('seriesName');
            $table->string('seriesNameKana');
            $table->string('contents');
            $table->string('contentsKana');
            $table->string('author');
            $table->string('authorKana');
            $table->string('publisherName');
            $table->string('size');
            $table->integer('isbn');
            $table->string('itemCaption');
            $table->date('salesDate');
            $table->unsignedInteger('itemPrice');
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

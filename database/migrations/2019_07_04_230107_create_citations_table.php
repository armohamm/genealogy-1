<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description', 65535);
            $table->dateTime('date')->nullable();
            $table->integer('is_active');
            $table->integer('volume_id');
            $table->integer('page_id');
            $table->integer('confidence');
            $table->integer('source_id')->references('id')->on('sources');
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
        Schema::dropIfExists('citations');
    }
}

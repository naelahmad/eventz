<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address')->nullable();
            $table->longText('description');
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->integer('available_tickets')->nullable();
            $table->date('event_date')->nullable();
            $table->boolean('refund')->default(false);


            $table->unsignedBigInteger('event_type')->nullable();
            $table->foreign('event_type')->references('id')->on('types');
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
        Schema::dropIfExists('events');
    }
}

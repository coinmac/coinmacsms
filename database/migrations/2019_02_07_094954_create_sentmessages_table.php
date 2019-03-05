<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',11);
            $table->string('recipient');
            $table->string('group');
            $table->text('message');
            $table->string('scheduled');
            $table->string('scheduletime');
            $table->string('username');
            $table->string('messageid')->unique();
            $table->string('status');
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
        Schema::dropIfExists('sentmessages');
    }
}

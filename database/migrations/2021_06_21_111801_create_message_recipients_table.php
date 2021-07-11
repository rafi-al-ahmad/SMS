<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_recipients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipent_id');
            $table->foreign('recipent_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('recipent_group_id')->nullable();
            $table->foreign('recipent_group_id')->references('id')->on('messaging_groups')->onDelete('CASCADE');
            $table->unsignedBigInteger('message_id');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('CASCADE');
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
        Schema::dropIfExists('message_recipients');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("participant_id");
            $table->unsignedBigInteger("post_id")->nullable();
            $table->boolean("accepted")->nullable()->default(0);
            $table->integer("state")->nullable()->default(0); // 0=waiting, -1=closed, 1=accepted, 2=blocket, 3=accountClosed
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
        Schema::dropIfExists('Threads');
    }
}

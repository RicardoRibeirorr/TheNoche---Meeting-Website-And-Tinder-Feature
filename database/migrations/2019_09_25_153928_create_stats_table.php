<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('thread_id')->nullable()->comment('The opened thread, meaning, the last one, the one he is using');
            $table->boolean("updated_Image")->nullable();
            $table->timestamp("events_at")->nullable();
            $table->timestamp("invites_at")->nullable();
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
        Schema::dropIfExists('stats');
    }
}

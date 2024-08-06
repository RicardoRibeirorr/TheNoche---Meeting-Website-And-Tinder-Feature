<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string("content");
            $table->integer("type"); //0 invite - 1 event
            $table->timestamp("expire_at")->nullable()->default(Carbon::now()->add(1, 'week'));
            $table->boolean("active")->nullable()->default(1);
            $table->boolean("notify")->nullable()->default(1);
            $table->unsignedBigInteger("location_id");
            $table->unsignedBigInteger("user_id");
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
        Schema::dropIfExists('posts');
    }
}

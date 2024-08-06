<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->integer("gender")->nullable(); //0=male,1=female
            $table->integer("interest")->nullable();//0=male,1=female,2=both
            $table->integer("age");
            $table->string("phone")->nullable();
            $table->string("seek")->nullable(); //interests - separete by |

            $table->integer('views')->nullable()->default(0);
            $table->timestamp('terms_accepted')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

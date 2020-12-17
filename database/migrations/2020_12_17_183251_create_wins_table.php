<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->string('value', 45);
            $table->integer('status');
            $table->timestamps();


            $table->index(["user_id"], 'fk_wins_users_idx');

            $table->index(["type_id"], 'fk_wins_types1_idx');


            $table->foreign('user_id', 'fk_wins_users_idx')
                ->references('id')->on('users');

            $table->foreign('type_id', 'fk_wins_types1_idx')
                ->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wins');
    }
}

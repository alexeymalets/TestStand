<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('win_id');
            $table->integer('card')->nullable();
            $table->integer('status')->nullable();

            $table->timestamps();

            $table->index(["user_id"], 'fk_refunds_users1_idx');

            $table->index(["win_id"], 'fk_refunds_wins1_idx');


            $table->foreign('user_id', 'fk_refunds_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('win_id', 'fk_refunds_wins1_idx')
                ->references('id')->on('wins')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}

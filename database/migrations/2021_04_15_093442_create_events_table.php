<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
                       $table->string('title');
                       $table->string('content');
                       $table->date('start_date');
                       $table->date('end_date');
                       $table->time('start_time');
                       $table->time('end_time');
                       $table->string('group_id');
                       $table->integer('alert_flg');
                       $table->string('user_id');
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

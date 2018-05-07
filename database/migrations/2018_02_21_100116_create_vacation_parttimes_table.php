<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacationParttimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_parttimes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->text('reason');
            $table->time('start_time');
            $table->time('end_time');
            $table->SoftDeletes();
            $table->integer('user_id');
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
        Schema::dropIfExists('vacation_parttimes');
    }
}

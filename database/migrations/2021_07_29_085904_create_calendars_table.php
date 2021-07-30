<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')
                ->constrained('days')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('waste_id')
                ->constrained('wastes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->time('time_start');
            $table->time('time_interval')
                ->default(3600);
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
        Schema::dropIfExists('calendars');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->string('availability_type',1)->default('D');
            $table->integer('rolling_days')->unsigned()->nullable();
            $table->date('date_range_start')->nullable();
            $table->date('date_range_end')->nullable();
            $table->integer('increment_of')->unsigned()->nullable();
            $table->integer('maximum_events_per_day')->unsigned()->nullable();
            $table->integer('maximum_scheduling_notice')->unsigned()->nullable();
            $table->integer('buffer_before')->unsigned()->nullable();
            $table->integer('buffer_after')->unsigned()->nullable();
            $table->boolean('is_secret')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('availabilities', function (Blueprint $table) {
            $table->dropForeign('availabilities_event_id_foreign');
        });  
        Schema::dropIfExists('availabilities');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_profiles', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('position_id');
            $table->string('introduction');
            $table->date('register_date');
            $table->string('interest');
            $table->foreign('volunteer_id')
                ->references('id')
                ->on('volunteers')
                ->onDelete('cascade');
            $table->foreign('activity_id')
                ->references('id')
                ->on('activity_details')
                ->onDelete('cascade');
            $table->timestamps();
            $table->foreign('position_id')
                ->references('id')
                ->on('register_positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_profiles');
    }
}

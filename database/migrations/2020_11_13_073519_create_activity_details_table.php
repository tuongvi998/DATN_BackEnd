<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_details', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('group_id');
            $table->string('title');
            $table->date('close_date');     //close register
            $table->date('start_date');
            $table->date('end_date');
            $table->string('address');
            $table->string('content',10000);
            $table->unsignedBigInteger('max_register');
            $table->unsignedBigInteger('min_register');
            $table->string('image')->nullable();
            $table->decimal('donate',10,3);
            $table->decimal('cost',10,3);
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
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
        Schema::dropIfExists('activity_details');
    }
}

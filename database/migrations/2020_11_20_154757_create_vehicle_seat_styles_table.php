<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleSeatStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_seat_styles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id',false);
            $table->string('code')->unique();
            $table->string('name');
            $table->tinyInteger('width');
            $table->tinyInteger('length');
            $table->string('order');
            $table->string('theme')->nullable();
            $table->tinyInteger('use_count')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_seat_styles');
    }
}

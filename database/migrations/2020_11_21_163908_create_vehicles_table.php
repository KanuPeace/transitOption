<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id',false);
            $table->string('code')->unique();
            $table->string('name');
            $table->decimal('price');
            $table->string('color');
            $table->tinyInteger('type');
            $table->tinyInteger('no_of_seats');
            $table->unsignedBigInteger('vehicle_seat_style_id');
            $table->unsignedBigInteger('terminal_id');
            $table->string('route_from');
            $table->string('route_to');
            $table->string('plate_no');
            $table->string('driver_name');
            $table->string('driver_phones');
            $table->text('description')->nullable();
            $table->tinyinteger('condition')->default(1); //1 for New , 0 for fairly used
            $table->tinyinteger('is_transload')->default(0);
            $table->tinyinteger('has_ac')->default(0);
            $table->tinyinteger('is_priority')->default(0);
            $table->tinyinteger('is_featured')->default(0);
            $table->tinyinteger('is_available')->default(0);
            $table->tinyinteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('vehicle_seat_style_id')->references('id')->on('vehicle_seat_styles');
            $table->foreign('terminal_id')->references('id')->on('terminals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

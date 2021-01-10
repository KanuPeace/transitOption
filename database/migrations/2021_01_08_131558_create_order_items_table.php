<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOrderItemsTable.
 */
class CreateOrderItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table) {
			$table->id();
            $table->unsignedBigInteger('order_id',false);
            $table->unsignedBigInteger('user_id',false);
            $table->unsignedBigInteger('vehicle_id',false);
            $table->decimal('amount');
            $table->string('seats');
            $table->decimal('discount')->default(0);
            $table->text('extra')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->text('history')->nullable();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}
}

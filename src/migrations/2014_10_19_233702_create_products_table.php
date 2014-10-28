<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('images');
			$table->string('description')->nullable();
			$table->text('data')->nullable();
			$table->decimal('price', 30, 2)->nullable();
			$table->string('manufacturer')->nullable();
			$table->string('brand')->nullable();
			$table->string('model')->nullable();
			$table->string('type')->nullable(); // Type of Goods
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
		Schema::drop('products');
	}

}

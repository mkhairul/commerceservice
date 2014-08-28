<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
		    $table->engine = 'InnoDB';
				$table->increments('id');
				$table->string('name');
				$table->string('slug');
				$table->longText('description');
				$table->string('shortDescription');
				$table->string('metaDescription');
				$table->string('metaKeywords');
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
		Schema::drop('product');
	}

}

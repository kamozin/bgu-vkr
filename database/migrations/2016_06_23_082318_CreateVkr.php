<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkr extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('vkr', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_file'); //Наименование файла
			$table->string('family'); //фамилия
			$table->string('name'); //имя
			$table->string('otchestvo'); //отчество
			$table->string('id_fakultet');//идентификатор фаультета
			$table->string('napravlenie_podgotovki'); //направление подготовки
			$table->string('profile'); //профиль
			$table->string('tema'); //тема
			$table->string('dt'); //дата защиты
			$table->rememberToken();
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
		//
	}

}

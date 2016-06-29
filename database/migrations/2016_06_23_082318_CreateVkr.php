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
			$table->string('name_file'); //������������ �����
			$table->string('family'); //�������
			$table->string('name'); //���
			$table->string('otchestvo'); //��������
			$table->string('id_fakultet');//������������� ���������
			$table->string('napravlenie_podgotovki'); //����������� ����������
			$table->string('profile'); //�������
			$table->string('tema'); //����
			$table->string('dt'); //���� ������
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

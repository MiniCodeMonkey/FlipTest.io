<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->datetime('expire');
            $table->integer('app_id');
			$table->string('controller_id');
			$table->string('view_id');
			$table->string('test_type');
			$table->string('test_value');
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
        Schema::drop('tests');
    }

}

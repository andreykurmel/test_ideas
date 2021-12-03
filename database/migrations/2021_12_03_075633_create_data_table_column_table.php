<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTableColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_table_columns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('ddl_id')->nullable();
            $table->string('field', 64);
            $table->string('header', 128);
            $table->string('default', 255)->default('');
            $table->timestamps();

            $table->foreign('table_id')
                ->references('id')
                ->on('data_tables')
                ->onDelete('cascade');

            $table->foreign('ddl_id')
                ->references('id')
                ->on('dropdowns')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_table_column');
    }
}

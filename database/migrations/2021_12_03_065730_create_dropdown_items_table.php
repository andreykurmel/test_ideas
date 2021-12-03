<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropdownItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdown_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ddl_id');
            $table->string('value', 64);
            $table->string('show', 64)->default('');
            $table->string('image_path', 255)->default('');
            $table->timestamps();

            $table->foreign('ddl_id')
                ->references('id')
                ->on('dropdowns')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dropdown_items');
    }
}

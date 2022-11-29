<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('moodules_id');
            $table->integer('submenus_id')->nullable();
            $table->string('icon')->nullable();
            $table->string('name');
            $table->string('url');
            $table->string('folder');
            $table->string('blade');
            $table->string('sorter');
            $table->string('is_active');
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
        Schema::dropIfExists('cms_menus');
    }
}

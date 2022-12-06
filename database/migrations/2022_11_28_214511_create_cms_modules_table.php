<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_modules', function (Blueprint $table) {
            $table->id();
            $table->integer('cms_settings_id')->nullable();
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('middleware')->nullable();
            $table->string('controller')->nullable();
            $table->string('model')->nullable();
            $table->string('table')->nullable();
            $table->string('status')->nullable();
            $table->string('folder_controller')->nullable();
            $table->string('folder_model')->nullable();
            $table->string('folder_storage')->nullable();
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
        Schema::dropIfExists('cms_modules');
    }
}

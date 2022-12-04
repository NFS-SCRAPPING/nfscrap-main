<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsRoleAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_role_access', function (Blueprint $table) {
            $table->id();
            $table->integer('cms_role_id');
            $table->integer('cms_menus_id');
            $table->boolean('is_view');
            $table->boolean('is_create');
            $table->boolean('is_edit');
            $table->boolean('is_delete');
            $table->boolean('is_detail');
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
        Schema::dropIfExists('cms_role_access');
    }
}

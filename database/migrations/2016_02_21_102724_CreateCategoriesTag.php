<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
               
            $table->timestamp('created_at');
             $table->timestamp('updated_at');
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');   
            $table->timestamp('created_at');
             $table->timestamp('updated_at');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title');
            $table->text('post_detail');
            $table->string('post_photo');
            $table->integer('admin_id');
            $table->integer('category_id')->nullable();
            $table->string('post_slug')->nullable();
            $table->integer('visitor_count')->default(0);
            $table->string('show_on_menu')->default('Show');
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
        Schema::dropIfExists('posts');
    }
};

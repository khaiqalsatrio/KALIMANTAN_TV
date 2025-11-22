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
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'post_slug')) {
                $table->string('post_slug')->nullable();
            }
            // category_id jangan ditambahkan karena sudah ada
        });
    }


    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'post_slug')) {
                $table->dropColumn('post_slug');
            }
        });
    }
};

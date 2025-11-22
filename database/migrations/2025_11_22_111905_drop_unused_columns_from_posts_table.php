<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop kolom yang tidak dipakai
            if (Schema::hasColumn('posts', 'visitors')) {
                $table->dropColumn('visitors');
            }

            if (Schema::hasColumn('posts', 'author_id')) {
                $table->dropColumn('author_id');
            }

            if (Schema::hasColumn('posts', 'is_share')) {
                $table->dropColumn('is_share');
            }

            if (Schema::hasColumn('posts', 'is_comment')) {
                $table->dropColumn('is_comment');
            }

            if (Schema::hasColumn('posts', 'sub_category_id')) {
                $table->dropColumn('sub_category_id');
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Jika rollback
            $table->integer('visitors')->nullable();
            $table->integer('author_id')->nullable();
            $table->boolean('is_share')->nullable();
            $table->boolean('is_comment')->nullable();
            $table->integer('sub_category_id')->nullable();
        });
    }
};

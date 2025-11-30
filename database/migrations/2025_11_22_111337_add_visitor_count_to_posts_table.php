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
        if (!Schema::hasColumn('posts', 'visitor_count')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->integer('visitor_count')->default(0);
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('posts', 'visitor_count')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('visitor_count');
            });
        }
    }
};

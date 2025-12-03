<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_advertisements', function (Blueprint $table) {
            $table->dropColumn([
                'above_footer_ad',
                'above_footer_ad_url',
                'above_footer_ad_status',
            ]);
        });
    }

    public function down()
    {
        Schema::table('home_advertisements', function (Blueprint $table) {
            $table->string('above_footer_ad')->nullable();
            $table->string('above_footer_ad_url')->nullable();
            $table->string('above_footer_ad_status')->default('Hide');
        });
    }
};

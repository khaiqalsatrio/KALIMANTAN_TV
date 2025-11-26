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
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('about_title');
            $table->text('about_detail');
            $table->text('about_status');

            $table->text('faq_title');
            $table->text('faq_detail');
            $table->text('faq_status');

            $table->text('contact_title');
            $table->text('contact_detail');

            $table->string('contact_map_x')->nullable();
            $table->string('contact_map_y')->nullable();

            $table->text('terms_title');
            $table->text('terms_detail');
            $table->text('terms_status');

            $table->text('privacy_title');
            $table->text('privacy_detail');
            $table->text('privacy_status');

            $table->text('disclaimer_title');
            $table->text('disclaimer_detail');
            $table->text('disclaimer_status');

            $table->text('login_title');
            $table->text('login_detail');
            $table->text('login_status');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};

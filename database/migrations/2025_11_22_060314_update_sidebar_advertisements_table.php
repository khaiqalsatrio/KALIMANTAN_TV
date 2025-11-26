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
        Schema::create('sidebar_advertisements', function (Blueprint $table) {
            $table->id();
            // File iklan / gambar
            $table->string('sidebar_ad');
            // URL ke website tertentu (opsional)
            $table->string('sidebar_ad_url')->nullable();
            // Lokasi penempatan: Top, Middle, Bottom
            $table->enum('sidebar_ad_location', ['Top', 'Middle', 'Bottom']);
            // Status iklan: Show / Hide
            $table->enum('status', ['Show', 'Hide'])->default('Show');
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
        Schema::dropIfExists('sidebar_advertisements');
    }
};

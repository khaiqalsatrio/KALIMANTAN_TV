<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn(['contact_map_x', 'contact_map_y']);

            // Tambah kolom baru
            $table->text('contact_map_link')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            // Kembalikan kolom lama jika rollback
            $table->string('contact_map_x')->nullable();
            $table->string('contact_map_y')->nullable();

            // Hapus kolom baru
            $table->dropColumn('contact_map_link');
        });
    }
};

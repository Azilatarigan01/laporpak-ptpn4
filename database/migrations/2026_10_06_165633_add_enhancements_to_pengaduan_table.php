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
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->boolean('is_anonim')->default(false)->after('kategori_id');
            $table->tinyInteger('rating')->nullable()->after('is_anonim');
            $table->text('feedback_pelapor')->nullable()->after('rating');
            $table->dateTime('tgl_tanggapan')->nullable()->after('feedback_pelapor');
            $table->string('petugas_nama')->nullable()->after('tgl_tanggapan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropColumn(['is_anonim', 'rating', 'feedback_pelapor', 'tgl_tanggapan', 'petugas_nama']);
        });
    }
};

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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'jabatan')) {
                $table->string('jabatan', 255)->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'urutan')) {
                $table->integer('urutan')->default(0)->after('user_type');
            }
            if (!Schema::hasColumn('users', 'deskripsi_jabatan')) {
                $table->text('deskripsi_jabatan')->nullable()->after('urutan');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'jabatan')) {
                $table->dropColumn('jabatan');
            }
            if (Schema::hasColumn('users', 'urutan')) {
                $table->dropColumn('urutan');
            }
            if (Schema::hasColumn('users', 'deskripsi_jabatan')) {
                $table->dropColumn('deskripsi_jabatan');
            }
        });
    }
};

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
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `news` MODIFY `intro` TEXT NULL");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `news` MODIFY `quote` TEXT NULL");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `news` MODIFY `conclusion` TEXT NULL");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `news` MODIFY `image` VARCHAR(255) NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

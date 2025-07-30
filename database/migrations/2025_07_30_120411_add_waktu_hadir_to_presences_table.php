<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->time('waktu')->after('tanggal');
            $table->boolean('hadir')->default(true)->after('waktu');
        });
    }

    public function down()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->dropColumn(['waktu', 'hadir']);
        });
    }
};

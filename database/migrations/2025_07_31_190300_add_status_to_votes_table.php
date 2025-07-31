<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToVotesTable extends Migration
{
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->string('status')->default('active')->after('tidak_setuju');
        });
    }

    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
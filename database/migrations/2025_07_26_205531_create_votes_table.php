<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
        {
            Schema::create('votes', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('deskripsi');
                $table->integer('setuju')->default(0);
                $table->integer('tidak_setuju')->default(0);
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};

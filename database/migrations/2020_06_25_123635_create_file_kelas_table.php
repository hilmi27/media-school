<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_kelas', function (Blueprint $table) {
           $table->foreignId('file_id')->constrained('files');
           $table->foreignId('kelas_id')->constrained('kelas');

           $table->primary(['file_id','kelas_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_kelas');
    }
}

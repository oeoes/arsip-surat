<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->date('tgl_pembukuan');
            $table->string('asal_surat');
            $table->string('no_surat');
            $table->string('index_surat');
            $table->date('tgl_surat');
            $table->enum('jenis_surat', ['masuk', 'keluar']);
            $table->text('perihal')->nullable();
            $table->string('tujuan');
            $table->string('keterangan');
            $table->string('penerima');
            $table->string('nip_penerima')->nullable();
            $table->string('arsip');
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
        Schema::dropIfExists('letters');
    }
}

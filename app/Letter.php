<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = [
        'judul', 'tgl_pembukuan', 'bulan', 'asal_surat', 
        'no_surat', 'index_surat', 'tgl_surat', 'nama_surat',
        'jenis_surat', 'perihal', 'tujuan', 
        'keterangan', 'penerima', 'nip_penerima', 'arsip'
        ];

}

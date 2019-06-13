<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = [
        'judul', 'tgl_pembukuan', 'asal_surat', 
        'no_surat', 'index_surat', 'tgl_surat', 
        'jenis_surat', 'perihal', 'tujuan', 
        'keterangan', 'penerima', 'nip_penerima', 'arsip'
        ];

}

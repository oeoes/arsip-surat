<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Letter;

class LetterController extends Controller
{

    public function __construct() {
        //
    }

    public static function storeSurat($path, $nama) {
        Letter::create([
            'judul' => request('judul'),
            'tgl_pembukuan' => request('tgl_pembukuan'),
            'asal_surat' => request('asal_surat'),
            'no_surat' => request('no_surat'),
            'index_surat' => request('index_surat'),
            'tgl_surat' => request('tgl_surat'),
            'jenis_surat' => request('jenis_surat'),
            'perihal' => request('perihal'),
            'tujuan' => request('tujuan'),
            'keterangan' => request('keterangan'),
            'penerima' => request('penerima'),
            'nip_penerima' => request('nip_penerima'),
            'arsip' => $path.'/'.$nama
        ]);
    }

    public static function currentVar($root) {
        $root->judul = request('judul');
        $root->tgl_pembukuan = request('tgl_pembukuan');
        $root->asal_surat = request('asal_surat');
        $root->no_surat = request('no_surat');
        $root->index_surat = request('index_surat');
        $root->tgl_surat = request('tgl_surat');
        $root->jenis_surat = request('jenis_surat');
        $root->perihal = request('perihal');
        $root->tujuan = request('tujuan');
        $root->keterangan = request('keterangan');
        $root->penerima = request('penerima');
        $root->nip_penerima = request('nip_penerima');
    }

    public static function updateDataSurat($path, $nama, $id, $status=True) {
        $current = Letter::find($id);

        if($status) {
            LetterController::currentVar($current);
            $current->arsip = $path.'/'.$nama;
            $current->save();

        }else {
            LetterController::currentVar($current);
            $current->save();
        }
    }

    public function home() {
        $data = Letter::limit(10)->get();

        return view('home', ['data' => $data]);
    }

    public function recordSurat() {
        $gambar = request()->file('arsip');
        $nama = time().'.'.$gambar->getClientOriginalExtension();
        $path_in = public_path('images/arsip/surat_masuk');
        $path_out = public_path('images/arsip/surat_keluar');

        if(request('jenis_surat') == 'masuk') {
            $gambar->move($path_in, $nama);
            LetterController::storeSurat('images/arsip/surat_masuk', $nama);
        }
        else {
            $gambar->move($path_out, $nama);
            LetterController::storeSurat('images/arsip/surat_keluar', $nama);
        }

        return back();
    }

    public function updateSurat($id) {
        $get_img = Letter::find($id)->first();
        $img = public_path().'/'.$get_img->arsip;

        if(request()->hasFile('arsip')) {
            $gambar = request()->file('arsip');
            $namasource = time().'.'.$gambar->getClientOriginalExtension();
            $path_in = public_path('images/arsip/surat_masuk');
            $path_out = public_path('images/arsip/surat_keluar');

            if(\File::exists($img)) {
                \File::delete($img);
            }

            if(request('jenis_surat') == 'masuk') {
                $gambar->move($path_in, $namasource);
                LetterController::updateDataSurat($path='images/arsip/surat_masuk', $nama=$namasource, $id);
            }
            else {
                $gambar->move($path_out, $namasource);
                LetterController::updateDataSurat($path='images/arsip/surat_keluar', $nama=$namasource, $id);
            }
        }
        else {
            if(request('jenis_surat') == 'masuk') {
                LetterController::updateDataSurat($path=null, $nama=null, $id, $status=False);
            }
            else {
                LetterController::updateDataSurat($path=null, $nama=null, $id, $status=False);
            }
        }

        return back();
    }

    public function deleteSurat($id) {
        $current = Letter::find($id);
        $img = public_path().'/'.$current->arsip;

        if(\File::exists($img))
        {
            \File::delete($img);
        }
        $current->delete();
        
        return back();
    }

    public function suratMasuk() {
        $data = Letter::where('jenis_surat', 'masuk')->get();

        return view('surat-masuk', ['data' => $data]);
    }

    public function suratKeluar() {
        $data = Letter::where('jenis_surat', 'keluar')->get();

        return view('surat-keluar', ['data' => $data]);
    }
}

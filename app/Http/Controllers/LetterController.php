<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Letter;
use DB;

class LetterController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public static function storeSurat($path, $nama) {
        $bulan = \Carbon\Carbon::createFromFormat('Y-m-d', request('tgl_pembukuan'));
        $bln = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        Letter::create([
            'judul' => request('judul'),
            'tgl_pembukuan' => request('tgl_pembukuan'),
            'bulan' => $bln[(int) $bulan->format('m')],
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
        $favorite = Letter::where('is_favorite', 1)->latest()->limit(10)->get();
        $fav_all = Letter::where('is_favorite', 1)->get();
        $accu = Letter::all()->count('id');
        $in = Letter::where('jenis_surat', 'masuk')->count('id');
        $out = Letter::where('jenis_surat', 'keluar')->count('id');

        return view('home', ['data' => $data, 'favorite' => $favorite, 'fav_all' => $fav_all, 'accu' => $accu, 'in' => $in, 'out' => $out]);
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

    public function addFavorite($id) {
        $current = Letter::find($id);

        if($current->is_favorite == 0) {
            $current->is_favorite = 1;
            $current->save();
        }else{
            $current->is_favorite = 0;
            $current->save();
        }        

        return back();
    }

    public function favoriteList() {
        $data = Letter::where('is_favorite', 1)->get();

        return view('favorite', ['data' => $data]);
    }

    public function letters($type) {
        if($type == 'all'){
            $data = DB::table('letters')->select('bulan', DB::raw('count(*) as total'))->groupBy('bulan')->get();
        }
        else if($type == 'in'){
            $data = DB::table('letters')->select('bulan', DB::raw('count(*) as total'))->groupBy('bulan')->where('jenis_surat', 'masuk')->get();
        }else{
            $data = DB::table('letters')->select('bulan', DB::raw('count(*) as total'))->groupBy('bulan')->where('jenis_surat', 'keluar')->get();
        }
        return response()->json($data);
    }
}

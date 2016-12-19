<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\File;


class BeritaController extends Controller
{
    public function index() {
        $berita = Berita::where('sifat_id','1')->orderBy('id','desc')->paginate(6);
        $sifat = 'publik';
        if (Auth::check()) {
            $beritaku = Auth::user()->berita()->paginate(3);
        }
        return view('berita.index', compact('berita', 'sifat', 'beritaku'));
    }

    public function alternatif() {
        $berita = Berita::where('sifat_id','1')->paginate(6);
        return view('berita.index_backup', compact('berita', 'sifat'));
    }

    public function internal() {
        $berita = Berita::where('sifat_id','2')->paginate(6);
        $sifat = 'internal';
        if (Auth::check()) {
            $beritaku = Auth::user()->berita()->paginate(3);
        }
        return view('berita.index', compact('berita', 'sifat', 'beritaku'));
    }
    
    public function show($id) {
        $daftarBerita = Berita::where('sifat_id','1')->orderBy('id','desc')->simplePaginate(6);
        $berita = Berita::find($id);
        if ($berita->sifat_id == '2' && !Auth::check()) {
            return 'Maaf informasi ini hanya untuk anggota Serikat Pekerja BPJS Ketenagakerjaan';
        }
        $sifat = 'publik';
        $komentar = $berita->komentar()->paginate(10);
        return view('berita.show', compact('berita','komentar','daftarBerita', 'sifat'));
    }

    public function showInternal($id) {
        $daftarBerita = Berita::where('sifat_id','2')->orderBy('id','desc')->simplePaginate(6);
        $berita = Berita::find($id);
        $sifat = 'internal';
        $komentar = $berita->komentar()->paginate(10);
        return view('berita.show', compact('berita','komentar','daftarBerita', 'sifat'));
    }

    public function filePathParts($arg1) {
        echo $arg1['dirname'];
    }

    public function tulis(Request $request) {
        $berita = Berita::create([
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'sifat_id' => $request->input('sifat'),
        ]);

        $gambar = $request->input('filepath');

        foreach($gambar as $key => $n) {
            if ($gambar[$key]) {
                $image = Gambar::create(['image_path' => $gambar[$key],
                    'image_path_thumb' => pathinfo($gambar[$key])['dirname'],
                    'filename' => pathinfo($gambar[$key])['filename'].'.'.pathinfo($gambar[$key])['extension']
                ]);
                $berita->gambar()->attach($image);
            }
        }

        $berita->user()->attach(Auth::user());


        return redirect('/');
    }


    public  function postKomentar(Request $request, $id) {
        $berita = Berita::where('id', $id)->first();
        $komentar = nl2br($request->input('komentar'));
        $user = Auth::user();
        $berita->komentar()->create(['isi' => $komentar, 'user_id' => $user->id]);

        return redirect('/berita/'.$id.'#komentar');
    }
}

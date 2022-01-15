<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function __construct(){
        return $this->middleware('guru');
    }

    public function index()
    {
        $jadwalSupervisi = Jadwal::where('nip', Auth::user()->nip)->get();
        return view('guru.jadwal.index', compact('jadwalSupervisi'));
    }

    public function listRpp()
    {
        $document = Document::where('nip', Auth::user()->nip)->get();
        return view('guru.document.list', compact('document'));
    }

    public function addRpp()
    {
        return view('guru.document.add');
    }

    public function postRpp(Request $request)
    {
        $validasi = $request->validate([
            'mapel' => 'required|string',
            'rpp' => 'required|mimetypes:application/pdf|max:5120',
            'embed' => 'required'
        ]);

        $rpp = time(). '-' .$request->rpp->getClientOriginalName();
        $request->rpp->move(public_path('materi'), $rpp);

        $post = Document::create([
            'nip' => Auth::user()->nip,
            'mapel' => $request->mapel,
            'rpp' => $rpp,
            'embed' => $request->embed,
        ]);

        return redirect()->route('listRpp');
    }
}

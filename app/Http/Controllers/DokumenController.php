<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function getTriwulan()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '1')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen Triwulan';
        $header = 'Data Triwulan';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getUmkm()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '2')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen UMKM';
        $header = 'Data UMKM';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getBansos()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '3')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen Bansos';
        $header = 'Data Bansos';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getMasjid()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '4')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen Masjid dan Mushola';
        $header = 'Data Masjid dan Mushola';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getMonography()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '5')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen Monography';
        $header = 'Data Monography';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getKelurahanCantik()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '6')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen Kelurahan Cantik';
        $header = 'Data Kelurahan Cantik';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getPkk()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '7')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen PKK';
        $header = 'Data PKK';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function getPbb()
    {
        $dokumen = Dokumen::with('user.profil')->where('kategori_id', '8')->orderBy('updated_at', 'DESC')->get();
        $title = 'Dokumen PBB';
        $header = 'Data PBB';
        return view('dokumen.index', compact('dokumen', 'title', 'header'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('dokumen.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_dokumen' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file')->getClientOriginalName();
        $fileName = time() . '_' . $file;

        $dokumen = Dokumen::create([
            'user_id' => auth()->user()->id,
            'kategori_id' => $request->kategori_id,
            'nama_dokumen' => $request->nama_dokumen,
            'keterangan' => $request->keterangan,
            'file' => $request->file->storeAs('dokumen', $fileName),
        ]);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.edit', compact('dokumen', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_dokumen' => 'required',
            'file' => 'unique:dokumen'
        ]);

        $dokumen = Dokumen::findOrFail($id);

        if($request->file) {
            Storage::delete($dokumen->file);
            $file = $request->file('file')->getClientOriginalName();
            $fileName = time() . '_' . $file;
            $dokumen->file = $request->file->storeAs('dokumen', $fileName);
        }

        $dokumen->update([
            'user_id' => auth()->user()->id,
            'kategori_id' => $request->kategori_id,
            'nama_dokumen' => $request->nama_dokumen,
            'keterangan' => $request->keterangan,
        ]);
        
        return back()->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        Storage::delete($dokumen->file);
        $dokumen->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $ekstensi = pathinfo($dokumen->file, PATHINFO_EXTENSION);

        if($ekstensi == 'pdf') {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $dokumen->file . '"');
            readfile(storage_path('app/' . $dokumen->file));
        } else {
            return Storage::download($dokumen->file);
        }
    }
}

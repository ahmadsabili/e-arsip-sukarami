<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $triwulan = Dokumen::where('kategori_id', 1)->count();
        $umkm = Dokumen::where('kategori_id', 2)->count();
        $bansos = Dokumen::where('kategori_id', 3)->count();
        $masjid = Dokumen::where('kategori_id', 4)->count();
        $monography = Dokumen::where('kategori_id', 5)->count();
        $paud = Dokumen::where('kategori_id', 6)->count();

        return view('dashboard', compact('triwulan', 'masjid', 'umkm', 'bansos', 'monography', 'paud'));
    }
}

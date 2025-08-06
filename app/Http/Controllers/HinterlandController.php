<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HinterlandController extends Controller
{
    // Menampilkan detail hinterland berdasarkan id
    public function show($id)
    {
        // Bisa tambahkan logika pengambilan data sesuai id jika diperlukan
        return view('data-hinterland.detail-hinterland', compact('id'));
    }
}

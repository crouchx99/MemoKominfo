<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelaporan;
use PDF;

class ViewController extends Controller
{
    public function view($id) 
    {
        $data = Pelaporan::where('id', $id)->get();
        return view('user.rekapitulasi.detail', compact('data'));
    }

    public function cetak_pdf()
    {
    	$pdf = PDF::loadview('user.rekapitulasi.detail');
    	return $pdf->download('laporan-pdf');
    }
}

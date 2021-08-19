<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelaporan;

class ViewController extends Controller
{
    public function view($id) 
    {
        $data = Pelaporan::where('id')->get();
        return view('user.rekapitulasi.detail', compact('data'));
    }
}

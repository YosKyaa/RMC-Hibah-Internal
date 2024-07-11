<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        return view('dokumentasi');
    }
}

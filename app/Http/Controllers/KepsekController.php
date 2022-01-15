<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function __construct()
    {
        return $this->middleware('kepsek');
    }
    public function index()
    {
        return view('kepsek.index');
    }
}

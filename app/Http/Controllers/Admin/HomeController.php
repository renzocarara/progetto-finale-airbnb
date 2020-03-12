<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // funzione per visualizzare la dashboard admin
    public function index()
    {
        return view('admin.home');
    }
}

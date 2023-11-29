<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Satwa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countArtikel = Artikel::count();
        $countSatwa = Satwa::count();
        return view('dashboard.dashboard', compact('countArtikel', 'countSatwa'));
    }
}

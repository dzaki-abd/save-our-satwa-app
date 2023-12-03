<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Pelaporan;
use App\Models\Satwa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countArtikel = Artikel::count();
        $countSatwa = Satwa::count();
        $countAdmin = User::role('admin')->count();
        $countPelaporan = Pelaporan::count();
        return view('dashboard.dashboard', compact('countArtikel', 'countSatwa', 'countAdmin', 'countPelaporan'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Donasi;
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

    public function getChartDataDonasi()
    {
        $donations = Donasi::where('status', 'Sudah Diverifikasi')
            ->orderBy('updated_at')
            ->get();

        $data = $donations->groupBy(function ($item) {
            return $item->updated_at->format('M');
        })->map(function ($group) {
            return $group->sum('jumlah_donasi');
        })->toArray();

        return response()->json(['data' => $data]);
    }

    public function getChartDataLaporan()
    {
        $laporans = Pelaporan::all();

        $data = $laporans->groupBy(function ($item) {
            return $item->status;
        })->map(function ($group) {
            return $group->count();
        })->toArray();

        $desiredOrder = ['Ditinjau', 'Disetujui', 'Ditolak'];

        $orderedData = [];
        foreach ($desiredOrder as $key) {
            if (isset($data[$key])) {
                $orderedData[$key] = $data[$key];
            } else {
                $orderedData[$key] = 0;
            }
        }

        return response()->json(['data' => $orderedData]);
    }
}

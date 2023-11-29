<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\User;
use App\Models\BuktiKejadian;
use App\Models\Donasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'addLaporan',
            ]
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function addLaporan(Request $request)
    {
        if ($request->name != null && $request->no_hp != null && $request->email != null) {
            if (User::where('email', $request->email)->first() == null) {
                $request->validate([
                    'name' => 'required',
                    'no_hp' => 'required',
                    'email' => 'required',
                ]);

                $user = User::create([
                    'name' => $request->name,
                    'no_hp' => $request->no_hp,
                    'email' => $request->email,
                    'role' => 'guest',
                ]);

                $request->request->add(['user_id' => $user->id]);
            } else {
                $user = User::where('email', $request->email)->first();

                $request->request->add(['user_id' => $user->id]);
            }
        } else {
            $user = Auth()->user();

            $request->request->add(['user_id' => $user->id]);
        }

        $request->validate([
            'waktu_kejadian' => 'required',
            'lokasi_kejadian' => 'required',
            'jenis_pelanggaran' => 'required',
            'jenis_satwa' => 'required',
            'deskripsi_kejadian' => 'required',
            'tindak_lanjut' => 'nullable',
            'catatan_tambahan' => 'nullable',
            'user_id' => 'required',
        ]);

        if ($request->jenis_pelangaran == 'Lainnya') {
            $request->validate([
                'jenis_pelanggaran_lainnya' => 'required',
            ]);
            $request->request->add(['jenis_pelanggaran' => $request->jenis_pelanggaran_lainnya]);
        }

        if ($request->jenis_satwa == 'Lainnya') {
            $request->validate([
                'jenis_satwa_lainnya' => 'required',
            ]);
            $request->request->add(['jenis_satwa' => $request->jenis_satwa_lainnya]);
        }

        if ($request->hasFile('hasil_investigasi')) {
            $request->validate([
                'hasil_investigasi' => 'required|file|mimes:pdf|max:10240',
            ]);
            $hasil = time() . '.' . $request->file('hasil_investigasi')->extension();
            $request->file('hasil_investigasi')->move(public_path('storage/hasil_investigasi/'), $hasil);

            $request->request->add(['hasil_investigasi' => $hasil]);
        }

        Pelaporan::create([
            'uniqid' => uniqid(),
            'waktu_kejadian' => $request->waktu_kejadian,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'jenis_satwa' => $request->jenis_satwa,
            'deskripsi_kejadian' => $request->deskripsi_kejadian,
            'tindak_lanjut' => $request->tindak_lanjut,
            'hasil_investigasi' => $request->hasil_investigasi,
            'catatan_tambahan' => $request->catatan_tambahan,
            'status' => 'Ditinjau', // 'Ditinjau', 'Diverifikasi', 'Ditolak
            'user_id' => $request->user_id,
        ]);

        for ($i = 1; $i <= 10; $i++) {
            if ($request->hasFile('gambar' . $i)) {
                $request->validate([
                    'gambar' . $i => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                ]);

                $imageName = time() . $i . '.' . $request->file('gambar' . $i)->extension();
                $request->file('gambar' . $i)->move(public_path('storage/bukti_kejadian/'), $imageName);

                $request->request->add(['bukti_kejadian' => $imageName]);
                $request->request->add(['pelaporan_id' => Pelaporan::latest()->first()->id]);

                BuktiKejadian::create($request->all());
            }
        }

        if ($request->link_gdrive != null) {
            $request->validate([
                'link_gdrive' => 'required',
            ]);

            $request->request->add(['bukti_kejadian' => $request->link_gdrive]);
            $request->request->add(['pelaporan_id' => Pelaporan::latest()->first()->id]);

            BuktiKejadian::create($request->all());
        }

        return redirect()->back()
            ->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function addDonasi(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_donatur' => 'required',
                'email_donatur' => 'required',
                'nomor_donatur' => 'required',
                'jumlah_donatur' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $namaFile = 'donasi-' . time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('img/donasi_images', $namaFile, 'public');

            Donasi::create([
                'nama_donatur' => $validatedData['nama_donatur'],
                'email' => $validatedData['email_donatur'],
                'no_hp' => $validatedData['nomor_donatur'],
                'bukti_transfer' => $namaFile,
                'jumlah_donasi' => $validatedData['jumlah_donatur'],
            ]);

            return redirect()->back()->with('success', 'Konfirmasi dikirim, terima kasih.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Konfirmasi gagal dikirim, silahkan coba lagi.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\User;
use App\Models\BuktiKejadian;
use App\Models\Donasi;
use App\Models\Satwa;
use App\Models\Artikel;
use App\Models\Pelanggaran;
use Yajra\DataTables\Facades\DataTables;
use DOMDocument;
use DOMXPath;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', [
    //         'except' => [
    //             'addLaporan',
    //         ]
    //     ]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pelaporanList = Pelaporan::all();

        $ditinjauCount = $pelaporanList->where('status', 'Ditinjau')->count();
        $disetujuiCount = $pelaporanList->where('status', 'Disetujui')->count();
        $ditolakCount = $pelaporanList->where('status', 'Ditolak')->count();

        $satwaList = Satwa::all();

        $artikelList = Artikel::all();
    
        foreach ($artikelList as $artikel) {
            $dom = new DOMDocument();

            $dom->loadHTML($artikel->konten);

            $xpath = new DOMXPath($dom);

            $firstParagraph = $xpath->query('//p')->item(0);

            if ($firstParagraph !== null) {
                $artikel->konten = $firstParagraph->nodeValue;
            }
        }

        return view('index', compact('satwaList', 'artikelList', 'ditinjauCount', 'disetujuiCount', 'ditolakCount'));
    }

    public function indexLaporkan()
    {
        $satwa = Satwa::all();
        $pelanggaran = Pelanggaran::all();

        return view('laporkan', compact('satwa', 'pelanggaran'));
    }
    public function profile()
    {
        $laporan = Pelaporan::all();
        $user = Auth()->user();
        $countLaporan = [
            'ditinjau' => $laporan->where('status', 'Ditinjau')->where('user_id', $user->id)->count(),
            'disetujui' => $laporan->where('status', 'Disetujui')->where('user_id', $user->id)->count(),
            'ditolak' => $laporan->where('status', 'Ditolak')->where('user_id', $user->id)->count(),
        ];
        return view('profil', compact('countLaporan','user'));
    }

    public function ubahProfile()
    {
        $user = Auth()->user();
        return view('ubah-profil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $foto = 'foto/' . time() . '.' . $file->extension();
            $file->move(public_path('storage/foto/'), $foto);

            User::where('id', $user->id)->update([
                'foto' => $foto,
            ]);
        }

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        

        return redirect()->back()
            ->with('success', 'Profil berhasil diubah.');
    }

    public function addLaporan(Request $request)
    {
        $user = Auth()->user();
        $request->request->add(['user_id' => $user->id]);

        $request->validate([
            'waktu_kejadian' => 'required',
            'lokasi_kejadian' => 'required',
            'pelanggaran_id' => 'required',
            'pelanggaran_lain' => 'nullable',
            'satwa_id' => 'required',
            'satwa_lain' => 'nullable',
            'deskripsi_kejadian' => 'required',
            'tindak_lanjut' => 'nullable',
            'catatan_tambahan' => 'nullable',
            'user_id' => 'required',
        ]);

        if ($request->pelanggaran_id == 'Lainnya') {
            $request->validate([
                'pelanggaran_lain' => 'required',
            ]);
            $request->request->add(['pelanggaran_id' => $request->pelanggaran_lain]);
        }

        if ($request->satwa_id == 'Lainnya') {
            $request->validate([
                'satwa_lain' => 'required',
            ]);
            $request->request->add(['satwa_id' => $request->satwa_lain]);
        }

        if ($request->hasFile('hasil_investigasi')) {
            $request->validate([
                'hasil_investigasi' => 'required|file|mimes:pdf|max:10240',
            ]);

            $file = $request->file('hasil_investigasi');
            $hasil = 'hasil_investigasi/' . time() . '.' . $file->extension();
            $file->move(public_path('storage/hasil_investigasi/'), $hasil);

            Pelaporan::create([
                'uniqid' => uniqid(),
                'waktu_kejadian' => $request->waktu_kejadian,
                'lokasi_kejadian' => $request->lokasi_kejadian,
                'pelanggaran_id' => $request->pelanggaran_id,
                'satwa_id' => $request->satwa_id,
                'deskripsi_kejadian' => $request->deskripsi_kejadian,
                'tindak_lanjut' => $request->tindak_lanjut,
                'hasil_investigasi' => $hasil,
                'catatan_tambahan' => $request->catatan_tambahan,
                'status' => 'Ditinjau', // 'Ditinjau', 'Diverifikasi', 'Ditolak
                'user_id' => $request->user_id,
            ]);
        } else {
            Pelaporan::create([
                'uniqid' => uniqid(),
                'waktu_kejadian' => $request->waktu_kejadian,
                'lokasi_kejadian' => $request->lokasi_kejadian,
                'pelanggaran_id' => $request->pelanggaran_id,
                'satwa_id' => $request->satwa_id,
                'deskripsi_kejadian' => $request->deskripsi_kejadian,
                'tindak_lanjut' => $request->tindak_lanjut,
                'hasil_investigasi' => $request->hasil_investigasi,
                'catatan_tambahan' => $request->catatan_tambahan,
                'status' => 'Ditinjau', // 'Ditinjau', 'Diverifikasi', 'Ditolak
                'user_id' => $request->user_id,
            ]);
        }

        $gambar = $request->file('gambar');

        foreach ($gambar as $key => $value) {
            $name = 'bukti_kejadian/' . time() . $key . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('storage/bukti_kejadian/'), $name);

            $data[] = $name;
        }

        foreach ($data as $key => $value) {
            BuktiKejadian::create([
                'bukti_kejadian' => $value,
                'pelaporan_id' => Pelaporan::latest()->first()->id,
            ]);
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

    public function getDataPelaporan($filters)
    {
        $laporan = Pelaporan::where('status',$filters)->where('user_id', Auth()->user()->id)->get();

        return DataTables::of($laporan)
            ->addColumn('pelanggaran_id', function ($row) {
                return $row->pelanggaran->nama_pelanggaran;
            })
            ->addColumn('tanggal_kejadian', function ($row) {
                return date('d F Y', strtotime($row->waktu_kejadian));
            })
            ->addColumn('satwa_id', function ($row) {
                return $row->satwa->nama_lokal;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'Ditolak') {
                    $badgeStatus = '<span class="badge text-bg-danger text-white">' . $row->status . '</span>';
                } elseif ($row->status == 'Ditinjau') {
                    $badgeStatus = '<span class="badge text-bg-warning text-white">' . $row->status . '</span>';
                } else {
                    $badgeStatus = '<span class="badge text-bg-success text-white">' . $row->status . '</span>';
                }
                return $badgeStatus;
            })
            ->rawColumns(['status'])
            ->make(true);
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

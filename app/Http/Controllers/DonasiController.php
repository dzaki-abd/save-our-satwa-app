<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DonasiController extends Controller
{
    public function index()
    {
        $jumlahDonasi = Donasi::where('status', 'Sudah Diverifikasi')->sum('jumlah_donasi');
        return view('dashboard.donasi.index', compact('jumlahDonasi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_donatur' => 'required',
                'email_donatur' => 'required',
                'nomor_donatur' => 'required',
                'jumlah_donatur' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
                'status' => 'required',
            ]);

            $namaFile = 'donasi-' . time() . '.' . $request->image->extension();
            $namaFile_db = 'donasi_images/' . $namaFile;
            $request->file('image')->move(public_path('storage/donasi_images'), $namaFile);

            $validatedData['jumlah_donatur'] = str_replace('.', '', $validatedData['jumlah_donatur']);

            Donasi::create([
                'nama_donatur' => $validatedData['nama_donatur'],
                'email' => $validatedData['email_donatur'],
                'no_hp' => $validatedData['nomor_donatur'],
                'bukti_transfer' => $namaFile_db,
                'jumlah_donasi' => $validatedData['jumlah_donatur'],
                'status' => $validatedData['status'],
            ]);

            return redirect()->back()->with('success', 'Donasi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Donasi $donasi)
    {
        //
    }

    public function edit($id)
    {
        try {
            $donasi = Donasi::findOrFail($id);

            return response()->json([
                'status' => true,
                'data' => $donasi
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $donasi = Donasi::findOrFail($id);

            $validatedData = $request->validate([
                'nama_donatur' => 'required',
                'email_donatur' => 'required',
                'nomor_donatur' => 'required',
                'jumlah_donatur' => 'required',
                'image_edit' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            if ($request->hasFile('image_edit')) {
                $image_path = public_path('storage/' . $donasi->bukti_transfer);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                $namaFile = 'donasi-' . time() . '.' . $request->image_edit->extension();
                $request->file('image_edit')->storeAs('', $namaFile, 'public');

                $donasi->update([
                    'nama_donatur' => $validatedData['nama_donatur'],
                    'email' => $validatedData['email_donatur'],
                    'no_hp' => $validatedData['nomor_donatur'],
                    'bukti_transfer' => $namaFile,
                    'jumlah_donasi' => $validatedData['jumlah_donatur'],
                ]);
            } else {
                $donasi->update([
                    'nama_donatur' => $validatedData['nama_donatur'],
                    'email' => $validatedData['email_donatur'],
                    'no_hp' => $validatedData['nomor_donatur'],
                    'jumlah_donasi' => $validatedData['jumlah_donatur'],
                ]);
            }

            return redirect()->back()->with('success', 'Donasi berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $donasi = Donasi::findOrFail($id);

            $image_path = public_path('storage/' . $donasi->bukti_transfer);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $donasi->delete();

            return response()->json([
                'status' => true,
                'message' => 'Donasi berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getDataDonasi()
    {
        $donasi = Donasi::all();

        return DataTables::of($donasi)
            ->addIndexColumn()
            ->addColumn('nama_donatur', function ($row) {
                return $row->nama_donatur;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('no_hp', function ($row) {
                return $row->no_hp;
            })
            ->addColumn('bukti_transfer', function ($row) {
                return $row->bukti_transfer;
            })
            ->addColumn('jumlah_donasi', function ($row) {
                $jumlah = number_format($row->jumlah_donasi, 0, ',', '.');
                return $jumlah;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'Belum Diverifikasi') {
                    return '<span class="badge badge-danger">' . $row->status . '</span>';
                } else if ($row->status == 'Sudah Diverifikasi') {
                    return '<span class="badge badge-success">' . $row->status . '</span>';
                }
            })
            ->addColumn('input_by', function ($row) {
                if($row->input_by == 'User') {
                    return '<span class="badge badge-primary">' . $row->input_by . '</span>';
                } else if($row->input_by == 'Admin') {
                    return '<span class="badge badge-secondary">' . $row->input_by . '</span>';
                }
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="btn-group" role="group" aria-label="Action">';

                if ($row->status == 'Belum Diverifikasi') {
                    $actionBtn .= '
                        <button type="button" class="btn btn-success btn-md btn-icon" onclick="verifyDonasi(' . $row->id . ')" title="Verifikasi"><i class="fa-solid fa-check"></i></button>
                    ';
                }

                $actionBtn .= '
                        <button type="button" class="btn btn-primary btn-md btn-icon" onclick="editDonasi(' . $row->id . ')" title="Detail / Edit"><i class="fa-solid fa-eye"></i></button>
                    ';

                if ($row->status == 'Belum Diverifikasi') {
                    $actionBtn .= '
                        <button type="button" class="btn btn-danger btn-md btn-icon" onclick="destroyDonasi(' . $row->id . ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                    ';
                }

                $actionBtn .= '</div>';

                return $actionBtn;
            })
            ->rawColumns(['action', 'status', 'input_by'])
            ->make(true);
    }

    public function verifyDonasi($id)
    {
        try {
            $donasi = Donasi::findOrFail($id);

            $donasi->update([
                'status' => 'Sudah Diverifikasi'
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Donasi berhasil diverifikasi.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getDataDonasiForUser()
    {
        $jumlahDonasi = Donasi::where('status', 'Sudah Diverifikasi')->sum('jumlah_donasi');

        return view('donasi', compact('jumlahDonasi'));
    }
}

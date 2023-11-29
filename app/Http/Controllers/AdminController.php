<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $countAdmin = User::role('admin')->count();
        return view('dashboard.admin.index', compact('countAdmin'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_admin' => 'required',
                'email_admin' => 'required|unique:users,email',
                'nomor_admin' => 'required',
                'password_admin' => 'required',
                'confirm_password_admin' => 'required|same:password_admin',
            ]);

            User::create([
                'name' => $validatedData['nama_admin'],
                'email' => $validatedData['email_admin'],
                'no_hp' => $validatedData['nomor_admin'],
                'password' => bcrypt($validatedData['password_admin']),
            ])->assignRole(['admin']);

            return redirect()->back()->with('success', 'Admin berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        try {
            $admin = User::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $admin
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update($id)
    {
        try {
            $admin = User::findOrFail($id);

            $validatedData = request()->validate([
                'nama_admin_edit' => 'required',
                'email_admin_edit' => 'required|unique:users,email,' . $id,
                'nomor_admin_edit' => 'required',
            ]);

            if(request()->filled('password_admin')) {
                $validatedData = request()->validate([
                    'password_admin_edit' => 'required',
                    'confirm_password_admin_edit' => 'required|same:password_admin',
                ]);

                $admin->update([
                    'name' => $validatedData['nama_admin_edit'],
                    'email' => $validatedData['email_admin_edit'],
                    'no_hp' => $validatedData['nomor_admin_edit'],
                    'password' => bcrypt($validatedData['password_admin_edit']),
                ]);
            } else {
                $admin->update([
                    'name' => $validatedData['nama_admin_edit'],
                    'email' => $validatedData['email_admin_edit'],
                    'no_hp' => $validatedData['nomor_admin_edit'],
                ]);
            }

            return redirect()->back()->with('success', 'Admin berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $admin = User::findOrFail($id);
            $admin->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Admin berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getDataAdmin()
    {
        $admin = User::role('admin')->get();

        return DataTables::of($admin)
            ->addIndexColumn()
            ->addColumn('nama', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('no_hp', function ($row) {
                return $row->no_hp;
            })
            ->addColumn('action', function ($row) {
                if(auth()->user()->email === 'admin@example.com'){
                    $actionBtn = '
                        <div class="btn-group" role="group" aria-label="Action">
                            <button type="button" class="btn btn-warning btn-md btn-icon" onclick="editAdmin(' . $row->id . ')" title="Edit"><i class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-danger btn-md btn-icon" onclick="destroyAdmin(' . $row->id . ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    ';
                } else {
                    $actionBtn = '
                        <p>Anda tidak memiliki hak</p>
                    ';
                
                }

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
}

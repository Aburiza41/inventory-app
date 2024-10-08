<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Mengambil semua data dari model Owner
            $owners = Owner::all();

            // Mengembalikan response JSON dengan status 200 dan data dari Owner
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diambil.',
                'data' => $owners
            ], 200);
        } catch (\Throwable $th) {
            // Handling error jika terjadi masalah
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
            'phone_3' => 'nullable',
            'address' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone_1.required' => 'Nomor telepon utama wajib diisi dan harus terdiri dari 10-15 digit.',
            'address.required' => 'Alamat wajib diisi.',
            'perusahaan.required' => 'Nama perusahaan wajib diisi.',
        ]);

        try {
            // Mulai transaksi
            DB::beginTransaction();

            // Membuat owner baru
            $owner = new Owner();
            $owner->uuid = (string) Str::uuid();
            $owner->name = $request->name;
            $owner->email = $request->email;
            $owner->phone_1 = $request->phone_1;
            $owner->phone_2 = $request->phone_2;
            $owner->phone_3 = $request->phone_3;
            $owner->email = $request->email;
            $owner->address = $request->address;
            $owner->corporate = $request->perusahaan;
            $owner->save();

            // Commit transaksi jika tidak ada error
            DB::commit();

            // Mengembalikan response sukses
            return response()->json([
                'success' => true,
                'message' => 'Data owner berhasil disimpan.',
                'data' => $owner,
            ], 201); // HTTP status code 201 Created

        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            // Log error untuk debugging
            Log::error('Error saving owner: ', ['error' => $th]);

            // Mengembalikan response error
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data owner.',
                'error' => $th->getMessage(),
            ], 500); // HTTP status code 500 Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

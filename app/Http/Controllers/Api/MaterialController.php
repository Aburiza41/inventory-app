<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Mengambil semua data dari model Owner
            $materials = Material::all();

            // Mengembalikan response JSON dengan status 200 dan data dari Owner
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diambil.',
                'data' => $materials
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
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'satuan.required' => 'Satuan wajib diisi.',
            'satuan.string' => 'Satuan harus berupa teks.',
            'satuan.max' => 'Satuan maksimal 100 karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi maksimal 500 karakter.',
        ]);

        try {
            // Mulai transaksi
            DB::beginTransaction();

            // Membuat owner baru
            $material = new Material();
            $material->uuid = (string) Str::uuid();
            $material->title = $request->title;
            $material->unit = $request->satuan;
            $material->description = $request->description;
            $material->save();

            // Commit transaksi jika tidak ada error
            DB::commit();

            // Mengembalikan response sukses
            return response()->json([
                'success' => true,
                'message' => 'Data owner berhasil disimpan.',
                'data' => $material,
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

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $materials = Material::get();
    //     return view('pages.inventory.index')->with(compact('materials'));
    // }

    public function index(Request $request)
    {
        // Membuat query dasar untuk model Material
        $query = Material::query();

        // Jika parameter 'search' ada dan tidak kosong, tambahkan kondisi pencarian ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Melakukan paginasi dengan jumlah item per halaman 2
        $materials = $query->paginate(10);

        // Mengembalikan view dengan data materials
        return view('pages.inventory.index', compact('materials'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $item = Material::where('uuid', $id)->first();
        return view('pages.inventory.edit', compact('item'));
        // return view('pages.inventory.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ], [
            'title.required' => 'Title wajib diisi.',
            'satuan.required' => 'Satuan wajib diisi.',
        ]);

        if ($validator->fails()) {
            // Set Alert
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $item = Material::where('uuid', $id)->first();
            $item->title = $request->title;
            $item->unit = $request->satuan;
            $item->save();

            DB::commit();

            Alert::success('Berhasil', 'Berhasil mengubah daftar belanja ' . $item->title);

            return redirect()->route('inventory.index');
            // return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;

            Alert::error('Maaf', 'Gagal mengubah daftar belanja');
            return redirect()->back();
            // return response()->json(['message' => 'Terjadi kesalahan, data tidak tersimpan', 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

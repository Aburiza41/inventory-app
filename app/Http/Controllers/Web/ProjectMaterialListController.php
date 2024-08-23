<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProjectMaterialList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectMaterialListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $item = ProjectMaterialList::where('uuid', $id)->first();
        // dd($item);
        return view('pages.project.material_list.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'vol' => 'required|min:1',
            'harga' => 'required|min:1',
            'satuan' => 'required|string|max:255',
            'jenis' => 'required|min:1',
        ], [
            'vol.required' => 'Jumlah volume wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'satuan.required' => 'Satuan wajib diisi.',
            'jenis.required' => 'Jenis wajib diisi.',
        ]);

        if ($validator->fails()) {
            // Set Alert
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $item = ProjectMaterialList::where('uuid', $id)->first();
            $item->quantity = $request->vol;
            $item->unit = $request->satuan;
            $item->price = $request->harga;
            $item->material_id = $request->jenis;
            $item->save();

            DB::commit();

            Alert::success('Berhasil', 'Berhasil mengubah daftar belanja ' . $item->project->title);

            return redirect()->route('purchase_order.index');
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
        try {
            DB::beginTransaction();

            $item = ProjectMaterialList::where('uuid', $id)->first();
            $item->status = "Dibatalkan";
            $item->save();

            DB::commit();

            Alert::success('Berhasil', 'Berhasil mengubah daftar belanja ' . $item->project->title);

            return redirect()->route('purchase_order.index');
            // return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;

            Alert::error('Maaf', 'Gagal mengubah daftar belanja');
            return redirect()->back();
            // return response()->json(['message' => 'Terjadi kesalahan, data tidak tersimpan', 'error' => $th->getMessage()], 500);
        }
    }
}

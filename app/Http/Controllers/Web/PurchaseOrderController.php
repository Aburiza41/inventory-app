<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMaterialList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $ProjectMaterialLists = ProjectMaterialList::paginate(2);

    //     return view('pages.purchase.order.index')->with(compact('ProjectMaterialLists'));
    // }
    public function index(Request $request)
    {
        $query = ProjectMaterialList::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('project.owner', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('project', function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            })->orWhereHas('material', function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            });
        }

        $ProjectMaterialLists = $query->paginate(2);

        return view('pages.purchase.order.index', compact('ProjectMaterialLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.purchase.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'owner' => 'required|integer|exists:owners,id',
            'project' => 'nullable|string|max:255',
            'vol' => 'required|array|min:1',
            'vol.*' => 'required|numeric|min:1',
            'harga' => 'required|array|min:1',
            'harga.*' => 'required|numeric|min:1',
            'satuan' => 'required|array|min:1',
            'satuan.*' => 'required|string|max:255',
            'jenis' => 'required|array|min:1',
            'jenis.*' => 'required|integer|exists:materials,id', // assuming valid values are 1, 2, or 3
        ], [
            'owner.required' => 'Pemilik wajib dipilih.',
            'owner.integer' => 'ID pemilik harus berupa angka.',
            'owner.exists' => 'ID pemilik tidak valid.',
            'vol.required' => 'Jumlah volume wajib diisi.',
            'vol.*.numeric' => 'Jumlah volume harus berupa angka.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.*.numeric' => 'Harga harus berupa angka.',
            'satuan.required' => 'Satuan wajib diisi.',
            'satuan.*.string' => 'Satuan harus berupa teks.',
            'jenis.required' => 'Jenis wajib diisi.',
            'jenis.*.integer' => 'Jenis harus berupa angka.',
            'jenis.*.in' => 'ID jenis tidak valid.',
        ]);

        // Setelah validasi, data yang diterima dapat diproses lebih lanjut

        // dd($request->all());

        // Create Project
        try {
            DB::beginTransaction();

            // Menyimpan data ke tabel Project
            $project = new Project();
            $project->uuid = (string) Str::uuid();
            $project->owner_id = $request->owner;
            $project->title = $request->project;
            $project->save();

            // Menyimpan data ke tabel ProjectMaterialList
            foreach ($request->jenis as $k_jenis => $v_jenis) {
                $project_material_list = new ProjectMaterialList();
                $project_material_list->uuid = (string) Str::uuid();
                $project_material_list->project_id = $project->id;
                $project_material_list->material_id = $request->jenis[$k_jenis];
                $project_material_list->unit = $request->satuan[$k_jenis];
                $project_material_list->quantity = $request->vol[$k_jenis];
                $project_material_list->price = $request->harga[$k_jenis];
                $project_material_list->save();
            }

            DB::commit();

            Alert::success('Berhasil', 'Berhasil Menambahkan daftar belanja '. $project->title);

            return redirect()->route('purchase_order.index');
            // return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            Alert::error('Maaf', 'Gagal Menambahkan daftar belanja');
            return redirect()->back();
            // return response()->json(['message' => 'Terjadi kesalahan, data tidak tersimpan', 'error' => $th->getMessage()], 500);
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

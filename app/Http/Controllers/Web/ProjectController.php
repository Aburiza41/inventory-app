<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $projects = Project::get();
    //     return view('pages.project.index')->with(compact('projects'));
    // }
    public function index(Request $request)
    {
        // Membuat Owner  dasar untuk model Material
        $query = Project::query();

        // Jika parameter 'search' ada dan tidak kosong, tambahkan kondisi pencarian ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Melakukan paginasi dengan jumlah item per halaman 2
        $projects = $query->paginate(2);

        // Mengembalikan view dengan data materials
        return view('pages.project.index', compact('projects'));
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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Project::where('uuid', $id)->first();
        return view('pages.project.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ], [
            'title.required' => 'Judul wajib diisi.',
        ]);

        if ($validator->fails()) {
            // Set Alert
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $item = Project::where('uuid', $id)->first();
            $item->title = $request->title;
            $item->save();

            DB::commit();

            Alert::success('Berhasil', 'Berhasil mengubah proyek ' . $item->title);

            return redirect()->route('project.index');
            // return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;

            Alert::error('Maaf', 'Gagal mengubah proyek');
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

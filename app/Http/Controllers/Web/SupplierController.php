<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('pages.supplier.index');
    // }

    public function index(Request $request)
    {
        // Membuat Owner  dasar untuk model Material
        $query = Supplier::query();

        // Jika parameter 'search' ada dan tidak kosong, tambahkan kondisi pencarian ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Melakukan paginasi dengan jumlah item per halaman 2
        $suppliers = $query->paginate(2);

        // Mengembalikan view dengan data materials
        return view('pages.supplier.index', compact('suppliers'));
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
        $item = Supplier::where('uuid', $id)->first();
        return view('pages.supplier.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            // Set Alert
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $item = Supplier::where('uuid', $id)->first();
            $item->name = $request->name;
            $item->email = $request->email;
            $item->phone_1 = $request->phone_1;
            $item->phone_2 = $request->phone_2;
            $item->phone_3 = $request->phone_3;
            $item->email = $request->email;
            $item->address = $request->address;
            $item->corporate = $request->perusahaan;
            $item->save();

            DB::commit();

            Alert::success('Berhasil', 'Berhasil mengubah supplier ' . $item->name);

            return redirect()->route('owner.index');
            // return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;

            Alert::error('Maaf', 'Gagal mengubah supplier');
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

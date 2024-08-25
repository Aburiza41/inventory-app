<?php

namespace App\Http\Controllers\Web;

use App\Exports\ProjectsExport;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\MaterialOrder;
use App\Models\MaterialOrderList;
use App\Models\Project;
use App\Models\ProjectMaterialList;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $projects = Project::get();
    //     return view('pages.purchase.index')->with(compact('projects'));
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
        $projects = $query->paginate(10);

        // Mengembalikan view dengan data materials
        return view('pages.purchase.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $uuid)
    {
        $project = Project::where('uuid', $uuid)->first();
        // dd($ProjectMaterialList);
        // dd($project, $project->project_material_lists);
        return view('pages.purchase.create')->with(compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $uuid)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            '_token' => 'required|string',
            'supplier' => 'required|integer|exists:suppliers,id',
            'status' => 'nullable',
            'material.*' => 'required|string|max:255',
            'satuan.*' => 'required|numeric|min:1',
            'jumlah.*' => 'required|numeric|min:1',
            'harga.*' => 'required|numeric|min:1',
            'diskon.*' => 'nullable|numeric|min:0',
        ], [
            '_token.required' => 'Token wajib diisi.',
            'supplier.required' => 'Supplier wajib diisi.',
            'supplier.integer' => 'Supplier harus berupa angka.',
            'supplier.exists' => 'Supplier tidak ditemukan.',
            'status.required' => 'Status wajib diisi.',
            'status.boolean' => 'Status harus berupa nilai boolean.',
            'material.*.required' => 'Material wajib diisi.',
            'material.*.string' => 'Material harus berupa string.',
            'material.*.max' => 'Material tidak boleh lebih dari 255 karakter.',
            'satuan.*.required' => 'Satuan wajib diisi.',
            'satuan.*.numeric' => 'Satuan harus berupa angka.',
            'satuan.*.min' => 'Satuan harus lebih dari 0.',
            'jumlah.*.required' => 'Jumlah wajib diisi.',
            'jumlah.*.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.*.min' => 'Jumlah harus lebih dari 0.',
            'harga.*.required' => 'Harga wajib diisi.',
            'harga.*.numeric' => 'Harga harus berupa angka.',
            'harga.*.min' => 'Harga harus lebih dari 0.',
            'diskon.*.nullable' => 'Diskon boleh kosong.',
            'diskon.*.numeric' => 'Diskon harus berupa angka.',
            'diskon.*.min' => 'Diskon tidak boleh kurang dari 0.',
        ]);




try {
    DB::transaction(function () use ($uuid, $request) {
        // Temukan project berdasarkan UUID
        $project = Project::where('uuid', $uuid)->first();
        $project->status = 'selesai';
        $project->save();

        // Buat entri baru di MaterialOrder
        $materialOrder = new MaterialOrder();
        $materialOrder->uuid = (string) Str::uuid();
        $materialOrder->user_id = Auth::user()->id;
        $materialOrder->supplier_id = $request->supplier;

        // Jika ada file bukti pembayaran, simpan gambar dan path-nya
        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $imagePath = $image->store('bukti_pembayaran', 'public');
            $materialOrder->image = $imagePath;
        }

        // Jika status diatur, tandai status sebagai "Lunas"
        if (isset($request->status)) {
            $materialOrder->status = "Lunas";
        }

        // Ambil data supplier berdasarkan ID
        $supplier = Supplier::where('id', $request->supplier)->first();
        $materialOrder->buyer_name = $supplier->name;
        $materialOrder->buyer_phone = $supplier->phone_1; // Jika phone field tersedia
        $materialOrder->buyer_address = $supplier->address; // Jika address field tersedia
        $materialOrder->buyer_corporate = $supplier->corporate; // Jika corporate field tersedia
        $materialOrder->buyer_number_invoice = $request->nota;

        // Set tanggal pembelian dan jatuh tempo
        $materialOrder->purchase_date = now();
        $materialOrder->due_date = $request->due_date;

        // Hitung total harga dan pembayaran saat ini (jika diperlukan)
        $total = array_sum($request->harga); // Misal jumlah total dari semua harga yang diinput
        $current = max(0, $total - $request->payment);

        $materialOrder->purchase_payment = $request->payment;
        $materialOrder->purchase_price = $total;
        $materialOrder->purchase_current = $current;
        $materialOrder->save();

        // Loop melalui daftar project_material_lists dan buat entri MaterialOrderList
        foreach ($project->project_material_lists as $k_project_material_list => $v_project_material_list) {
            $materialOrderList = new MaterialOrderList();
            $materialOrderList->uuid = (string) Str::uuid();
            $materialOrderList->material_order_id = $materialOrder->id;
            $materialOrderList->project_material_list_id = $v_project_material_list->id;
            $materialOrderList->brand = $request->jenis[$k_project_material_list];
            $materialOrderList->price = $request->harga[$k_project_material_list];
            $materialOrderList->discount = $request->diskon[$k_project_material_list] ?? 0;
            $materialOrderList->save();
        }
    });

    // return response()->json(['success' => true, 'message' => 'Material order created successfully.']);
    return redirect()->route('purchase.index');
} catch (\Throwable $th) {
    // Jika terjadi kesalahan, kembalikan respon error
    // return response()->json(['success' => false, 'message' => $th->getMessage()]);
    return redirect()->back();
}

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Project::where('uuid', $id)->first();
        return view('pages.purchase.show', compact('item'));
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

    public function export()
    {
        return Excel::download(new ProjectsExport, 'Purchase.xlsx');
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\MaterialInImport;
use App\Models\Material;
use App\Models\MaterialOrder;
use App\Models\MaterialOrderHistory;
use App\Models\MaterialOrderList;
use App\Models\MaterialOrderListHistory;
use App\Models\Owner;
use App\Models\Project;
use App\Models\ProjectMaterialList;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class MaterialOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Membuat Owner  dasar untuk model Material
        $query = MaterialOrderList::query();

        // Jika parameter 'search' ada dan tidak kosong, tambahkan kondisi pencarian ke query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Melakukan paginasi dengan jumlah item per halaman 2
        $material_order_lists = $query->paginate(10);

        // Mengembalikan view dengan data materials
        return view('pages.material.out.index', compact('material_order_lists'));
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
        // Debugging
        // dd($request->all());

        $validator = Validator::make(
            $request->all(),
            ['file' => 'required'],
            ['file.required' => 'File is required']
        );

        // Check for validation errors
        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $excel = Excel::toArray(new MaterialInImport, $request->file('file'));
        // dd($excel);


        $sheet_I00101 = []; // Sheet Supplier
        $sheet_I00102 = []; // Sheet Owner
        $sheet_I00103 = []; // Sheet Proyek
        $sheet_I00104 = []; // Sheet Barang Masuk
        $sheet_I00105 = []; // Sheet Barang Keluar

        foreach ($excel as $k_sheet => $v_sheet) {
            // dd($v_sheet[1][1]);

            switch ($v_sheet[1][1]) {
                case 'I00101':
                    $sheet_I00101 = $v_sheet;
                    break;
                case 'I00102':
                    $sheet_I00102 = $v_sheet;
                    break;
                case 'I00103':
                    $sheet_I00103 = $v_sheet;
                    break;
                case 'I00104':
                    $sheet_I00104 = $v_sheet;
                    break;
                case 'I00105':
                    $sheet_I00105 = $v_sheet;
                    break;

                default:

                    Alert::toast(Auth::user()->name . ' Menambahkan Data ' . now()->translatedFormat('l, H:i') . ' ' . now()->format('d-m-Y'), 'error')->position('bottom-end')->timerProgressBar();
                    return redirect()->back();
                    break;
            }
        }

        // Sheet Supplier
        // dd($sheet_I00101);
        // foreach ($sheet_I00101 as $k_row => $v_row) {
        //     if ($k_row > 3) {
        //         if (
        //             $v_row[0] != null
        //         ) {
        //             // dd($v_row);
        //             try {
        //                 // Mulai transaksi
        //                 // DB::beginTransaction();

        //                 $supplier = Supplier::firstOrCreate(
        //                     [
        //                         'name' => $v_row[1],
        //                         'phone_1' => $v_row[5],
        //                         'code' => $v_row[2],
        //                     ],  // Array pertama: kolom untuk dicocokkan
        //                     [
        //                         'uuid' => (string) Str::uuid(),
        //                         'name' => $v_row[1],
        //                         'code' => $v_row[2],
        //                         'no_rek' => $v_row[3],
        //                         'bank_name' => $v_row[4],
        //                         'phone_1' => $v_row[5],
        //                         'address' => $v_row[6],
        //                         'desc' => $v_row[7],

        //                     ]
        //                 );

        //                 // Commit transaksi jika tidak ada error
        //                 // DB::commit();

        //                 // Mengembalikan response sukses

        //             } catch (\Throwable $th) {
        //                 throw $th;
        //                 // Rollback transaksi jika terjadi error
        //                 // DB::rollBack();

        //                 // Log error untuk debugging
        //                 // Log::error('Error saving owner: ', ['error' => $th]);

        //                 // Mengembalikan response error

        //             }
        //         };
        //         // break;
        //     }
        //     continue;
        // }

        // Sheet Owner
        // dd($sheet_I00102);
        // foreach ($sheet_I00102 as $k_row => $v_row) {
        //     if ($k_row > 3) {
        //         if (
        //             $v_row[0] != null
        //         ) {
        //             // dd($v_row);
        //             try {
        //                 // Mulai transaksi
        //                 // DB::beginTransaction();

        //                 $owner = Owner::firstOrCreate(
        //                     [
        //                         'name' => $v_row[1],
        //                         'phone_1' => $v_row[2],
        //                     ],  // Array pertama: kolom untuk dicocokkan
        //                     [
        //                         'uuid' => (string) Str::uuid(),
        //                         'name' => $v_row[1],
        //                         'phone' => $v_row[2],
        //                         'email' => $v_row[3],
        //                         'address' => $v_row[4],

        //                     ]
        //                 );

        //                 // Commit transaksi jika tidak ada error
        //                 // DB::commit();

        //                 // Mengembalikan response sukses

        //             } catch (\Throwable $th) {
        //                 throw $th;
        //                 // Rollback transaksi jika terjadi error
        //                 // DB::rollBack();

        //                 // Log error untuk debugging
        //                 // Log::error('Error saving owner: ', ['error' => $th]);

        //                 // Mengembalikan response error

        //             }
        //         };
        //         // break;
        //     }
        //     continue;
        // }

        // Sheet Proyek
        // dd($sheet_I00103);
        // foreach ($sheet_I00103 as $k_row => $v_row) {
        //     if ($k_row > 3) {
        //         if (
        //             $v_row[0] != null
        //         ) {
        //             // dd($v_row);
        //             try {
        //                 // Mulai transaksi
        //                 // DB::beginTransaction();

        //                 // Find Owner
        //                 $owner = Owner::where('name', $v_row[1])->where('phone_1', $v_row[2])->first();
        //                 if (!$owner) {
        //                     continue;
        //                 }

        //                 // dd($owner->id);
        //                 $project = Project::firstOrCreate(
        //                     [
        //                         'title' => $v_row[4],
        //                         'code' => $v_row[3],
        //                     ],  // Array pertama: kolom untuk dicocokkan
        //                     [
        //                         'owner_id' => $owner->id,
        //                         'uuid' => (string) Str::uuid(),
        //                         'title' => $v_row[4],
        //                         'code' => $v_row[3]

        //                     ]
        //                 );

        //                 // Commit transaksi jika tidak ada error
        //                 // DB::commit();

        //                 // Mengembalikan response sukses

        //             } catch (\Throwable $th) {
        //                 throw $th;
        //                 // Rollback transaksi jika terjadi error
        //                 // DB::rollBack();

        //                 // Log error untuk debugging
        //                 // Log::error('Error saving owner: ', ['error' => $th]);

        //                 // Mengembalikan response error

        //             }
        //         };
        //         // break;
        //     }
        //     continue;
        // }

        // Sheet Barang Masuk
        // dd($sheet_I00104);
        // foreach ($sheet_I00104 as $k_row => $v_row) {
        //     if ($k_row > 3) {
        //         // if (
        //         //     $v_row[0] != null
        //         // ) {
        //         // dd($v_row);
        //         try {
        //             // Mulai transaksi
        //             // DB::beginTransaction();

        //             // 1. Find Owner
        //             $owner = Owner::where('name', $v_row[3])->where('phone_1', $v_row[4])->first();
        //             if (!$owner) {
        //                 continue;
        //             }

        //             // 2. Find Project
        //             $project = Project::where('title', $v_row[5])->where('code', $v_row[6])->first();
        //             if (!$project) {
        //                 continue;
        //             }

        //             // 3. Find Suplier
        //             $supplier = Supplier::where('name', $v_row[7])->where('code', $v_row[8])->where('phone_1', $v_row[9])->first();
        //             if (!$supplier) {
        //                 continue;
        //             }

        //             // 4. Find or Create Material
        //             $material = Material::firstOrCreate(
        //                 [
        //                     'title' => $v_row[11],
        //                     'unit' => $v_row[13]
        //                 ],  // Array pertama: kolom untuk dicocokkan
        //                 [
        //                     'uuid' => (string) Str::uuid(),
        //                     'title' => $v_row[11],
        //                     'unit' => $v_row[13]
        //                 ]
        //             );
        //             // dd($material);

        //             // 5. Material Order
        //             // Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($v_row[4] - 2)->format('Y-m-d');
        //             $material_order = MaterialOrder::firstOrCreate(
        //                 [
        //                     'buyer_number_invoice' => $v_row[10],
        //                     'supplier_id' => $supplier->id,
        //                     'purchase_date' => Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($v_row[2] - 2)->format('Y-m-d'),
        //                 ],  // Array pertama: kolom untuk dicocokkan
        //                 [
        //                     'user_id' => Auth::user()->id,
        //                     'supplier_id' => $supplier->id,
        //                     'uuid' => (string) Str::uuid(),
        //                     'buyer_name' => $supplier->name,
        //                     'buyer_phone' => $supplier->phone_1,
        //                     'buyer_number_invoice' => $v_row[10],
        //                     'purchase_date' => Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($v_row[2] - 2)->format('Y-m-d'),
        //                 ]
        //             );
        //             // dd($material_order);

        //             // 7. Project Material Order List
        //             $project_material_order_list = ProjectMaterialList::firstOrCreate(
        //                 [
        //                     'project_id' => $project->id,
        //                     'material_id' => $material->id,
        //                     'desc' => $v_row[14],
        //                 ],  // Array pertama: kolom untuk dicocokkan
        //                 [
        //                     'project_id' => $project->id,
        //                     'material_id' => $material->id,
        //                     'uuid' => (string) Str::uuid(),
        //                     'desc' => $v_row[14],
        //                     // 'unit' => $v_row[13], // Satuan Beli
        //                 ]
        //             );
        //             // dd($project_material_order_list);

        //             // 8. Material Order List
        //             $material_order_list = MaterialOrderList::firstOrCreate(
        //                 [
        //                     'material_order_id' => $material_order->id,
        //                     'project_material_list_id' => $project_material_order_list->id,
        //                     'code' => $v_row[1],
        //                 ],  // Array pertama: kolom untuk dicocokkan
        //                 [
        //                     'uuid' => (string) Str::uuid(),
        //                     'material_order_id' => $material_order->id,
        //                     'project_material_list_id' => $project_material_order_list->id,
        //                     'code' => $v_row[1],
        //                     'buy_quantity' => $v_row[12],
        //                     'current_quantity' => $v_row[12],
        //                 ]
        //             );
        //             // dd($material_order_list);

        //             // 9. Histori Material Order
        //             $material_order_history = new MaterialOrderHistory();
        //             $material_order_history->material_order_id = $material_order->id;
        //             $material_order_history->user_id = Auth::user()->id;
        //             $material_order_history->title = "Perubahan " . now();
        //             $material_order_history->desc = "Penambahan atau perubahan invoice : " . $material_order->buyer_number_invoice;
        //             $material_order_history->save();
        //             // dd($material_order_history);

        //             // 9. Histori Material Order
        //             $material_order_list_history = new MaterialOrderListHistory();
        //             $material_order_list_history->material_order_list_id = $material_order_list->id;
        //             $material_order_list_history->user_id = Auth::user()->id;
        //             $material_order_list_history->title = "Perubahan " . now();
        //             $material_order_list_history->desc = "Penambahan atau perubahan invoice : " . $material_order->buyer_number_invoice . " Kode : " . $material_order_list->code;
        //             $material_order_list_history->save();
        //             // dd($material_order_list_history);

        //             // Commit transaksi jika tidak ada error
        //             // DB::commit();

        //             // Mengembalikan response sukses

        //         } catch (\Throwable $th) {
        //             // dd($th->getMessage());
        //             throw $th;
        //             // Rollback transaksi jika terjadi error
        //             // DB::rollBack();

        //             // Log error untuk debugging
        //             // Log::error('Error saving owner: ', ['error' => $th]);

        //             // Mengembalikan response error
        //         }
        //         // };
        //         // break;
        //     }
        //     continue;
        // }

        // Sheet Barang Keluar

        foreach ($sheet_I00105 as $k_row => $v_row) {
            if ($k_row > 3) {
                // if (
                //     $v_row[0] != null
                // ) {
                // dd($v_row);
                try {
                    // Mulai transaksi
                    // DB::beginTransaction();

                    // 1. Find Owner
                    $owner = Owner::where('name', $v_row[3])->where('phone_1', $v_row[4])->first();
                    if (!$owner) {
                        continue;
                    }

                    // 2. Find Project
                    $project = Project::where('title', $v_row[5])->where('code', $v_row[6])->first();
                    if (!$project) {
                        continue;
                    }

                    // 3. Find Suplier
                    $supplier = Supplier::where('name', $v_row[7])->where('code', $v_row[8])->where('phone_1', $v_row[9])->first();
                    if (!$supplier) {
                        continue;
                    }

                    // 4. Find or Create Material
                    $material = Material::firstOrCreate(
                        [
                            'title' => $v_row[11],
                            'unit' => $v_row[13]
                        ],  // Array pertama: kolom untuk dicocokkan
                        [
                            'uuid' => (string) Str::uuid(),
                            'title' => $v_row[11],
                            'unit' => $v_row[13]
                        ]
                    );

                    // 5. Material Order
                    $material_order = MaterialOrder::firstOrCreate(
                        [
                            'buyer_number_invoice' => $v_row[10],
                            'supplier_id' => $supplier->id,
                            // 'purchase_date' => $v_row[2],
                            'purchase_date' => Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($v_row[2] - 2)->format('Y-m-d'),
                        ],  // Array pertama: kolom untuk dicocokkan
                        [
                            'user_id' => Auth::user()->id,
                            'supplier_id' => $supplier->id,
                            'uuid' => (string) Str::uuid(),
                            'buyer_name' => $supplier->name,
                            'buyer_phone' => $supplier->phone_1,
                            'buyer_number_invoice' => $v_row[10],
                            // 'purchase_date' => $v_row[2],
                            'purchase_date' => Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($v_row[2] - 2)->format('Y-m-d'),
                        ]
                    );

                    // 7. Project Material Order List
                    $project_material_order_list = ProjectMaterialList::firstOrCreate(
                        [
                            'project_id' => $project->id,
                            'material_id' => $material->id,
                            'desc' => $v_row[14],
                        ],  // Array pertama: kolom untuk dicocokkan
                        [
                            'project_id' => $project->id,
                            'material_id' => $material->id,
                            'uuid' => (string) Str::uuid(),
                            'desc' => $v_row[14],
                            // 'unit' => $v_row[13], // Satuan Beli
                        ]
                    );

                    // 8. Material Order List
                    $material_order_list = MaterialOrderList::firstOrCreate(
                        [
                            'material_order_id' => $material_order->id,
                            'project_material_list_id' => $project_material_order_list->id,
                            'code' => $v_row[1],
                        ],  // Array pertama: kolom untuk dicocokkan
                        [
                            'uuid' => (string) Str::uuid(),
                            'material_order_id' => $material_order->id,
                            'project_material_list_id' => $project_material_order_list->id,
                            'code' => $v_row[1],
                            'buy_quantity' => $v_row[12],
                            'current_quantity' => $v_row[12],
                        ]
                    );

                    $material_order_list->current_quantity = $material_order_list->current_quantity - $v_row[12];
                    $material_order_list->save();

                    // 9. Histori Material Order
                    $material_order_history = new MaterialOrderHistory();
                    $material_order_history->material_order_id = $material_order->id;
                    $material_order_history->user_id = Auth::user()->id;
                    $material_order_history->title = "Perubahan " . now();
                    $material_order_history->desc = "Pengurangan atau pengambilan invoice : " . $material_order->buyer_number_invoice;
                    $material_order_history->save();

                    // 9. Histori Material Order
                    $material_order_list_history = new MaterialOrderListHistory();
                    $material_order_list_history->material_order_list_id = $material_order_list->id;
                    $material_order_list_history->user_id = Auth::user()->id;
                    $material_order_list_history->title = "Perubahan " . now();
                    $material_order_list_history->desc = "Pengurangan atau pengambilan invoice : " . $material_order->buyer_number_invoice . " Kode : " . $material_order_list->code;
                    $material_order_list_history->save();


                    // Commit transaksi jika tidak ada error
                    // DB::commit();

                    // Mengembalikan response sukses

                } catch (\Throwable $th) {
                    throw $th;
                    // Rollback transaksi jika terjadi error
                    // DB::rollBack();

                    // Log error untuk debugging
                    // Log::error('Error saving owner: ', ['error' => $th]);

                    // Mengembalikan response error
                }
                // };
                // break;
            }
            continue;
        }
        // dd($sheet_I00105);
        return redirect()->back();
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

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Pembelian') }}
            </h2>

            {{-- <a href="{{ route('purchase.create') }}"
                class="px-4 py-2 rounded bg-gray-500 text-white flex justify-between align-middle">
                <span class="me-2 text-white font-bold">Buat Daftar Belanja</span>
                <box-icon name='send' color="#EB3678" class="bg-white rounded"></box-icon>
            </a> --}}

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="mb-4">
                        <form method="GET" action="{{ route('purchase.index') }}">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                            <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Pekerjaan</th>
                                <th class="px-2 py-1">Owner</th>
                                <th class="px-2 py-1">Jumlah</th>
                                <th class="px-2 py-1">Estimasi</th>
                                <th class="px-2 py-1">Total</th>
                                <th class="px-2 py-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            {{-- <td class="px-2 py-0">PT. Jaya Abadi</td>
                            <td class="px-2 py-0">Pembangunan Gedung</td>
                            <td class="px-2 py-0">Rp 1.500.000.000</td>
                            <td class="px-2 py-0">Rp 1.450.000.000</td>
                            <td class="px-2 py-0">
                                    <a href="{{ route('purchase.create') }}"
                                        class="flex justify-between align-middle">
                                        <box-icon type='solid' name='shopping-bags'></box-icon>
                                    </a>
                                </td> --}}

                                @foreach ($projects as $k => $item)
                                @php
                                    $jumlah = 0;
                                    $estimasi = 0;
                                    $total = 0;

                                    foreach ($item->project_material_lists as $k_project_material_list => $v_project_material_list) {
                                        // dd($v_project_material_list->material_order_list->discount);
                                        try {
                                        $jumlah+= $v_project_material_list->quantity;
                                        $estimasi+= ($v_project_material_list->price * $v_project_material_list->quantity);
                                        $total+= (($v_project_material_list->material_order_list->price - $v_project_material_list->material_order_list->discount) * $v_project_material_list->quantity);
                                        } catch (\Throwable $th) {
                                            //throw $th;
    //                                         \Log::error($th);
    // dd($th->getMessage());
                                        }
                                    }
                                    // dd($estimasi)
                                @endphp
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->title }}</td>
                                    <td class="px-2 py-0">{{ $item->owner->name }}</td>
                                    <td class="px-2 py-0">
                                        {{ $jumlah }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ $estimasi }}
                                    </td>
                                    <td class="px-2 py-0">{{ $total }}</td>
                                    <td class="px-2 py-0">
                                        @if ($item->status == 'aktif')
                                            <a href="{{ route('purchase.create', $item->uuid) }}"
                                                class="flex justify-between align-middle">
                                                <box-icon type='solid' name='shopping-bags'></box-icon>
                                            </a>
                                        @else
                                            <a href="{{ route('purchase.show', $item->uuid) }}"
                                                class="flex justify-between align-middle">
                                                <box-icon type='solid' name='show'></box-icon>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Supplier') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">

                    <div class="mb-4">
                        <form method="POST" action="{{ route('material.in.store') }}" class="flex gap-4" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="file" name="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                            <button type="submit" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py- px-4 rounded">
                                Upload
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">

                    <div class="mb-4">
                        <form method="GET" action="{{ route('material.out.index') }}" class="flex gap-4">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                            <button type="submit" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py- px-4 rounded">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="table-auto text-xs">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Kode</th>
                                <th class="px-2 py-1">Tanggal</th>
                                <th class="px-2 py-1">Nama Owner</th>
                                <th class="px-2 py-1">Nomor Telpon Owner</th>
                                <th class="px-2 py-1">Nama Pekerjaan</th>
                                <th class="px-2 py-1">Kode Pekerjaan</th>
                                <th class="px-2 py-1">Nama Supplier</th>
                                <th class="px-2 py-1">Kode Supplier</th>
                                <th class="px-2 py-1">Nomor Telpon Supplier</th>
                                <th class="px-2 py-1">Nomor Nota</th>
                                <th class="px-2 py-1">Nama Bahan</th>
                                <th class="px-2 py-1">Satuan</th>
                                <th class="px-2 py-1">Jumlah Beli</th>
                                {{-- <th class="px-2 py-1">Sisa Stok</th> --}}
                                <th class="px-2 py-1">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @foreach ($material_order_lists as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->code }}</td>
                                    <td class="px-2 py-0">{{ $item->material_order->purchase_date }}</td>
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->project->owner->name }}</td>
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->project->owner->phone_1 }}</td>
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->project->title }}</td>
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->project->code }}</td>
                                    <td class="px-2 py-0">{{ $item->material_order->buyer_name }}</td>
                                    <td class="px-2 py-0">{{ $item->material_order->supplier->code }}</td>
                                    <td class="px-2 py-0">{{ $item->material_order->buyer_phone }}</td>
                                    <td class="px-2 py-0">{{ $item->material_order->buyer_number_invoice }}</td>
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->material->title }}</td>
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->material->unit }}</td>
                                    <td class="px-2 py-0">{{ number_format($item->buy_quantity , 0, ',', '.') ?? '-' }}</td>
                                    {{-- <td class="px-2 py-0">{{ number_format($item->current_quantity , 0, ',', '.') ?? '-' }}</td> --}}
                                    <td class="px-2 py-0">{{ $item->projectMaterialList->desc }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-5">
                        {{ $material_order_lists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

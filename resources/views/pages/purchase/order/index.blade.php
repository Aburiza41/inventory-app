<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Rencana Pembelian') }}
            </h2>

            <a href="{{ route('purchase_order.create') }}"
                class="px-4 py-2 rounded bg-gray-500 text-white flex justify-between align-middle">
                <span class="me-2 text-white font-bold">Buat Daftar Rencana Belanja</span>
                <box-icon name='send' color="#EB3678" class="bg-white rounded"></box-icon>
            </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Owner</th>
                                <th class="px-2 py-1">Pekerjaan</th>
                                <th class="px-2 py-1">Nama Barang</th>
                                <th class="px-2 py-1">Vol</th>
                                <th class="px-2 py-1">Sat</th>
                                <th class="px-2 py-1">Estimasi Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            {{-- <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Jaya Abadi</td>
                                <td class="px-2 py-0">Pembangunan Gedung</td>
                                <td class="px-2 py-0">Semen</td>
                                <td class="px-2 py-0">500</td>
                                <td class="px-2 py-0">Sak</td>
                                <td class="px-2 py-0">Rp 50.000</td>
                            </tr> --}}
                            @foreach ($ProjectMaterialLists as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->project->owner->name }}</td>
                                    <td class="px-2 py-0">{{ $item->project->title }}</td>
                                    <td class="px-2 py-0">{{ $item->material->title }}</td>
                                    <td class="px-2 py-0">{{ $item->quantity }}</td>
                                    <td class="px-2 py-0">{{ $item->unit }}</td>
                                    <td class="px-2 py-0">{{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Material</th>
                                <th class="px-2 py-1">Satuan</th>
                                <th class="px-2 py-1">Jumlah</th>
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
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->title }}</td>
                                    <td class="px-2 py-0">{{ $item->owner->name }}</td>
                                    <td class="px-2 py-0">Rp 1.500.000.000</td>
                                    <td class="px-2 py-0">Rp 1.450.000.000</td>
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create', $item->uuid) }}"
                                            class="flex justify-between align-middle">
                                            <box-icon type='solid' name='shopping-bags'></box-icon>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

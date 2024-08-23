<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Bahan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    {{-- <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Owner</th>
                                <th class="px-2 py-1">Pekerjaan</th>
                                <th class="px-2 py-1">Nama Barang</th>
                                <th class="px-2 py-1">Vol</th>
                                <th class="px-2 py-1">Sat</th>
                                <th class="px-2 py-1">Harga Satuan</th>
                                <th class="px-2 py-1">Jumlah Harga</th>
                                @if (Auth::user()->role == 'admin')
                                    <th class="px-2 py-1">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Jaya Abadi</td>
                                <td class="px-2 py-0">Pembangunan Gedung</td>
                                <td class="px-2 py-0">Semen Portland</td>
                                <td class="px-2 py-0">100</td>
                                <td class="px-2 py-0">Zak</td>
                                <td class="px-2 py-0">Rp 65.000</td>
                                <td class="px-2 py-0">Rp 6.500.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">CV. Maju Terus</td>
                                <td class="px-2 py-0">Renovasi Rumah</td>
                                <td class="px-2 py-0">Batu Bata Merah</td>
                                <td class="px-2 py-0">2000</td>
                                <td class="px-2 py-0">Buah</td>
                                <td class="px-2 py-0">Rp 1.200</td>
                                <td class="px-2 py-0">Rp 2.400.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Sumber Makmur</td>
                                <td class="px-2 py-0">Pemasangan Atap</td>
                                <td class="px-2 py-0">Genteng Keramik</td>
                                <td class="px-2 py-0">500</td>
                                <td class="px-2 py-0">Lembar</td>
                                <td class="px-2 py-0">Rp 8.000</td>
                                <td class="px-2 py-0">Rp 4.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Karya Indah</td>
                                <td class="px-2 py-0">Pengecatan Dinding</td>
                                <td class="px-2 py-0">Cat Tembok</td>
                                <td class="px-2 py-0">50</td>
                                <td class="px-2 py-0">Galon</td>
                                <td class="px-2 py-0">Rp 120.000</td>
                                <td class="px-2 py-0">Rp 6.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">CV. Sejahtera</td>
                                <td class="px-2 py-0">Pemasangan Lantai</td>
                                <td class="px-2 py-0">Keramik 40x40</td>
                                <td class="px-2 py-0">100</td>
                                <td class="px-2 py-0">Dus</td>
                                <td class="px-2 py-0">Rp 90.000</td>
                                <td class="px-2 py-0">Rp 9.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Global Konstruksi</td>
                                <td class="px-2 py-0">Pembangunan Jalan</td>
                                <td class="px-2 py-0">Aspal Hotmix</td>
                                <td class="px-2 py-0">200</td>
                                <td class="px-2 py-0">Ton</td>
                                <td class="px-2 py-0">Rp 1.100.000</td>
                                <td class="px-2 py-0">Rp 220.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Sentosa</td>
                                <td class="px-2 py-0">Instalasi Listrik</td>
                                <td class="px-2 py-0">Kabel NYM 2x2.5</td>
                                <td class="px-2 py-0">1000</td>
                                <td class="px-2 py-0">Meter</td>
                                <td class="px-2 py-0">Rp 15.000</td>
                                <td class="px-2 py-0">Rp 15.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">CV. Berkah Utama</td>
                                <td class="px-2 py-0">Pemasangan Pintu</td>
                                <td class="px-2 py-0">Pintu Kayu Jati</td>
                                <td class="px-2 py-0">20</td>
                                <td class="px-2 py-0">Pcs</td>
                                <td class="px-2 py-0">Rp 2.500.000</td>
                                <td class="px-2 py-0">Rp 50.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Cahaya Terang</td>
                                <td class="px-2 py-0">Pemasangan Jendela</td>
                                <td class="px-2 py-0">Jendela Aluminium</td>
                                <td class="px-2 py-0">50</td>
                                <td class="px-2 py-0">Pcs</td>
                                <td class="px-2 py-0">Rp 1.800.000</td>
                                <td class="px-2 py-0">Rp 90.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Bangun Sejahtera</td>
                                <td class="px-2 py-0">Pemasangan Plafon</td>
                                <td class="px-2 py-0">Plafon Gypsum</td>
                                <td class="px-2 py-0">200</td>
                                <td class="px-2 py-0">Lembar</td>
                                <td class="px-2 py-0">Rp 60.000</td>
                                <td class="px-2 py-0">Rp 12.000.000</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-2 py-0">
                                        <a href="{{ route('purchase.create') }}" class="flex justify-between align-middle">
                                            <box-icon name='check-double'></box-icon>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table> --}}
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Material</th>
                                <th class="px-2 py-1">Satuan</th>
                                <th class="px-2 py-1">Jumlah</th>
                                <th class="px-2 py-1">Total</th>
                                {{-- <th class="px-2 py-1">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <tr class="border-b border-gray-500">
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

                                @foreach ($materials as $k => $item)
                                    <td class="px-2 py-0">{{ $item->title }}</td>
                                    <td class="px-2 py-0">{{ $item->unit }}</td>
                                    <td class="px-2 py-0">Rp 1.500.000.000</td>
                                    <td class="px-2 py-0">Rp 1.450.000.000</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

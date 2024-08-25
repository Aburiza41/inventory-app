<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Jenis/Bahan') }}
            </h2>

            <button data-modal-target="material-created" data-modal-toggle="material-created"
                class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <box-icon name='plus' color="white"></box-icon>
                <span class="ms-2">Jenis / Bahan</span>
            </button>

            <div id="material-created" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambah Data Jenis/Bahan
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="material-created">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" id="materialCreated">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Produk</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukkan nama produk" required>
                                </div>
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="satuan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                                    <input type="text" name="satuan" id="satuan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Masukkan satuan" required>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambah
                            </button>
                        </form>

                    </div>
                </div>
            </div>
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
                    <div class="mb-4">
                        <form method="GET" action="{{ route('inventory.index') }}" class="flex gap-4">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                            <button type="submit" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py- px-4 rounded">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Bahan</th>
                                <th class="px-2 py-1">Satuan</th>
                                {{-- <th class="px-2 py-1">Jumlah</th>
                                <th class="px-2 py-1">Total</th> --}}
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

                                @foreach ($materials as $k => $item)
                                    <tr class="border-b border-gray-500">
                                        <td class="px-2 py-0">{{ $item->title }}</td>
                                        <td class="px-2 py-0">{{ $item->unit }}</td>
                                        {{-- <td class="px-2 py-0">Rp 1.500.000.000</td>
                                        <td class="px-2 py-0">Rp 1.450.000.000</td> --}}
                                        <td class="px-2 py-0">
                                            <a href="{{ route('inventory.edit', $item->uuid) }}" class="text-blue-600 hover:underline">Ubah</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('materialCreated').addEventListener('submit', async function(event) {
            event.preventDefault(); // Mencegah form dari submit default

            // Mengambil data dari form
            const formData = new FormData(this);

            // Mengonversi FormData ke format JSON
            const data = {};
            formData.forEach((value, key) => data[key] = value);

            try {
                // Mengirim data ke server menggunakan fetch dengan async/await
                const response = await fetch('/api/material/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Menambahkan CSRF token
                    },
                    body: JSON.stringify(data)
                });

                // Memeriksa status response
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat mengirim data');
                }

                const result = await response.json(); // Parsing response sebagai JSON

                // Handling setelah sukses submit
                console.log('Data berhasil dikirim:', result);
                window.location.reload(); // Memuat ulang halaman

                alert('Data berhasil dikirim');
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan, data gagal dikirim');
            }
        });
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Owner') }}
            </h2>

                <!-- Modal toggle -->
                <button data-modal-target="owner-created" data-modal-toggle="owner-created"
                    class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <box-icon name='plus' color="white"></box-icon>
                    <span class="ms-2">Owner</span>
                </button>


            <!-- Main modal -->
    <div id="owner-created" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Data Owner
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="owner-created">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" id="myForm">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="col-span-2">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Email" required>
                        </div>
                        <div class="col-span-2">
                            <label for="phone_1"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon
                                Utama</label>
                            <input type="number" name="phone_1" id="phone_1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nomor Telepon Utama" required>
                        </div>
                        <div>
                            <label for="phone_2"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon
                                Opsional 1</label>
                            <input type="number" name="phone_2" id="phone_2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nomor Telepon Opsional 1">
                        </div>
                        <div>
                            <label for="phone_3"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon
                                Opsional 2</label>
                            <input type="number" name="phone_3" id="phone_3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan Nomor Telepon Opsional 2">
                        </div>
                        <div class="col-span-2">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="address" name="address" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Alamat Lengkap"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="perusahaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Perusahaan</label>
                            <textarea id="perusahaan" name="perusahaan" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Nama Perusahaan"></textarea>
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
                    
                    <div class="mb-4">
                        <form method="GET" action="{{ route('owner.index') }}" class="flex gap-4">
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
                                <th class="px-2 py-1">Nama</th>
                                <th class="px-2 py-1">Email</th>
                                <th class="px-2 py-1">Phone 1</th>
                                <th class="px-2 py-1">Phone 2</th>
                                <th class="px-2 py-1">Phone 3</th>
                                <th class="px-2 py-1">Alamat</th>
                                <th class="px-2 py-1">Perusahaan</th>
                                <th class="px-2 py-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @foreach ($owners as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->name }}</td>
                                    <td class="px-2 py-0">{{ $item->email }}</td>
                                    <td class="px-2 py-0">{{ $item->phone_1 }}</td>
                                    <td class="px-2 py-0">{{ $item->phone_2 }}</td>
                                    <td class="px-2 py-0">{{ $item->phone_3 }}</td>
                                    <td class="px-2 py-0">{{ $item->address }}</td>
                                    <td class="px-2 py-0">{{ $item->corporate }}</td>
                                    <td class="px-2 py-0">
                                        <a href="{{ route('owner.edit', $item->uuid) }}" class="text-blue-600 hover:underline">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-5">
                        {{ $owners->links() }}
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

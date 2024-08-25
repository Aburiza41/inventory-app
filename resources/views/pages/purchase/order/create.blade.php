<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Daftar Pembelian Bahan / Puschase Order') }}
            </h2>

            <a href="{{ route('purchase_order.index') }}"
                class="px-4 py-2 rounded bg-gray-500 text-white flex justify-between align-middle">
                <box-icon name='left-arrow-alt' color="#EB3678" class="bg-white rounded"></box-icon>
                <span class="ms-2 text-white font-bold">Kembali</span>
            </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class="w-full mx-auto gap-5" method="POST" action="{{ route('purchase_order.store') }}">
                        @csrf
                        <div class="mb-5 grid grid-cols-1 gap-4">
                            {{-- <div class="col-span-2">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Surat
                                    Jalan</label>
                                <input type="date" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com" required />
                            </div> --}}
                            <div class="flex justify-between gap-4">
                                <div class="w-full">
                                    <label for="owner"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner</label>
                                    <select id="owner" name="owner"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="" hidden>Pilih Owner</option>
                                    </select>
                                </div>

                                <div class="flex items-end ">
                                    <!-- Modal toggle -->
                                    <button data-modal-target="owner-created" data-modal-toggle="owner-created"
                                        class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <box-icon name='plus' color="white"></box-icon>
                                    </button>
                                </div>

                            </div>
                        </div>

                        <div class="mb-5">

                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                            <textarea id="project" name="project" rows="2"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tulis Nama Pekerjaan..."></textarea>

                        </div>

                        {{-- <div class="flex items-start mb-5 pb-5 border-b-4 border-gray-500 w-full">
                            <div class="flex items-center h-5">
                                <input id="status" type="checkbox" value=""
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                    required />
                            </div>
                            <label for="status"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lunas</label>
                        </div> --}}


                        <div class="flex justify-between gap-4 mb-5">
                            <div>
                                {{-- <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                    Belanja</label>
                                <input type="number" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com" required /> --}}
                                <h5>Daftar Purchase Order / Daftar Belanja</h5>
                            </div>

                            <div class="flex items-end gap-4">
                                <!-- Modal toggle -->
                                <button data-modal-target="material-created" data-modal-toggle="material-created"
                                    class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    <box-icon name='plus' color="white"></box-icon>
                                    <span class="ms-2">Jenis / Bahan</span>
                                </button>

                                <button id="add-form-button"
                                    class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    <box-icon name='plus' color="white"></box-icon>
                                    <span class="ms-2">Formulir Daftar Belanja</span>
                                </button>


                            </div>

                        </div>

                        <div id="form-container">
                            <div class="mb-5 grid grid-cols-4 gap-4">
                                <div>
                                    <label for="vol-jumlah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Volume/Jumlah
                                    </label>
                                    <input type="number" id="vol" name="vol[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukkan jumlah" required />
                                </div>
                                <div>
                                    <label for="harga"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Estimasi Harga
                                    </label>
                                    <input type="number" id="harga" name="harga[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukkan harga" required />
                                </div>
                                <div>
                                    <label for="satuan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Satuan
                                    </label>
                                    <input type="text" id="satuan" name="satuan[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukkan satuan" required />
                                </div>
                                <div class="flex justify-between gap-4">
                                    <div class="w-full">
                                        <label for="jenis"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Jenis
                                        </label>
                                        <select id="jenis" name="jenis[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected hidden>Pilih Bahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

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

    <!-- Main modal -->
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

    <script>
        // document.getElementById('add-form-button').addEventListener('click', function() {
        //     // Clone the form element
        //     let formContainer = document.getElementById('form-container');
        //     let newForm = formContainer.cloneNode(true);

        //     // Append the cloned form to the container
        //     document.body.appendChild(newForm);
        // });

        document.getElementById('add-form-button').addEventListener('click', function() {
            // Clone the form element
            let formContainer = document.getElementById('form-container');
            let newForm = formContainer.cloneNode(true);

            // Clear the values in the cloned form (optional)
            newForm.querySelectorAll('input, textarea').forEach(function(input) {
                input.value = '';
            });

            // Append the cloned form to the form-container
            formContainer.parentNode.insertBefore(newForm, formContainer.nextSibling);
        });


        document.getElementById('myForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Mencegah form dari submit default

            // Mengambil data dari form
            const formData = new FormData(this);

            // Mengonversi FormData ke format JSON
            const data = {};
            formData.forEach((value, key) => data[key] = value);

            try {
                // Mengirim data ke server menggunakan fetch dengan async/await
                const response = await fetch('/api/owner/store', {
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


        document.addEventListener('DOMContentLoaded', async () => {
            const categorySelect = document.getElementById('owner');

            try {
                // Memanggil API untuk mengambil data kategori
                const response = await fetch('/api/owner/index'); // Ganti dengan URL API Anda
                const owners = await response.json();

                // Memeriksa jika data kategori berhasil diambil
                if (response.ok && owners.data.length > 0) {
                    // Mengisi opsi pada select dengan data dari API
                    owners.data.forEach(owner => {
                        const option = document.createElement('option');
                        option.value = owner.id; // Ganti sesuai dengan struktur data API Anda
                        option.textContent = owner.name; // Ganti sesuai dengan struktur data API Anda
                        categorySelect.appendChild(option);
                    });
                } else {
                    console.error('Gagal mengambil data kategori atau data kategori kosong.');
                }
            } catch (error) {
                console.error('Terjadi kesalahan saat memuat kategori:', error);
            }


            const jenisSelect = document.getElementById('jenis');

            try {
                // Memanggil API untuk mengambil data kategori
                const response = await fetch('/api/material/index'); // Ganti dengan URL API Anda
                const materials = await response.json();

                // Memeriksa jika data kategori berhasil diambil
                if (response.ok && materials.data.length > 0) {
                    // Mengisi opsi pada select dengan data dari API
                    materials.data.forEach(material => {
                        const option = document.createElement('option');
                        option.value = material.id; // Ganti sesuai dengan struktur data API Anda
                        option.textContent = material
                        .title; // Ganti sesuai dengan struktur data API Anda
                        jenisSelect.appendChild(option);
                    });
                } else {
                    console.error('Gagal mengambil data kategori atau data kategori kosong.');
                }
            } catch (error) {
                console.error('Terjadi kesalahan saat memuat kategori:', error);
            }
        });
    </script>
</x-app-layout>

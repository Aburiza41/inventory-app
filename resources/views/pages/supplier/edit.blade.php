<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ubah Data Supplier '. $item->name) }}
            </h2>

            <a href="{{ route('supplier.index') }}"
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
                    <form class="w-full mx-auto gap-5"method="POST" action="{{ route('supplier.update', $item->uuid) }}">
                        @csrf
                        @method('PATCH')


                        <div class="mb-5 grid grid-cols-2 gap-4">

                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required value="{{ $item->name }}">
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required value="{{ $item->email }}">
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="phone_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telpon Utama</label>
                                <input type="tel" name="phone_1" id="phone_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required value="{{ $item->phone_1 }}">
                            </div>
                            <div class="">
                                <label for="phone_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telpon Opsionan 1</label>
                                <input type="tel" name="phone_2" id="phone_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" value="{{ $item->phone_2 }}">
                            </div>
                            <div class="">
                                <label for="phone_3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telpon Opsionan 2</label>
                                <input type="tel" name="phone_3" id="phone_3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" value="{{ $item->phone_3 }}">
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product address here">{{ $item->address }}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                                <textarea id="perusahaan" name="perusahaan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product perusahaan here">{{ $item->corporate }}</textarea>
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script>

    </script>
</x-app-layout>

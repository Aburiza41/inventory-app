<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ubah Data Proyek '. $item->title) }}
            </h2>

            <a href="{{ route('project.index') }}"
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
                    <form class="w-full mx-auto gap-5"method="POST" action="{{ route('project.update', $item->uuid) }}">
                        @csrf
                        @method('PATCH')


                        <div class="mb-5 grid grid-cols-2 gap-4">

                            <div class="col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Project</label>
                                <textarea id="title" name="title" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product perusahaan here">{{ $item->title }}</textarea>
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

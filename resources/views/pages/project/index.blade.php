<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Project') }}
            </h2>

            @if (Auth::user()->role == 'project_estimator')
                <a href="{{ route('purchase_order.create') }}"
                    class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <box-icon name='plus' color="white"></box-icon>
                        <span class="ms-2">Proyek</span>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">

                    <div class="mb-4">
                        <form method="GET" action="{{ route('project.index') }}" class="flex gap-4">
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
                                <th class="px-2 py-1">Nama Owner</th>
                                <th class="px-2 py-1">Judul</th>
                                <th class="px-2 py-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            {{-- <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">PT. Maju Jaya</td>
                                <td class="px-2 py-0">Pembangunan Gedung Perkantoran</td>
                                <td class="px-2 py-0">Proyek konstruksi gedung perkantoran 10 lantai di Jakarta.</td>
                            </tr> --}}
                            @foreach ($projects as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->owner->name }}</td>
                                    <td class="px-2 py-0">{{ $item->title }}</td>
                                    <td class="px-2 py-0">
                                        <a href="{{ route('project.edit', $item->uuid) }}" class="text-blue-600 hover:underline">Ubah</a>
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

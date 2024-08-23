<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Project') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Nama Owner</th>
                                <th class="px-2 py-1">Judul</th>
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
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

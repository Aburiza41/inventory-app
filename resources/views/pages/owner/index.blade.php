<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Owner') }}
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
                                <th class="px-2 py-1">Nama</th>
                                <th class="px-2 py-1">Email</th>
                                <th class="px-2 py-1">Phone 1</th>
                                <th class="px-2 py-1">Phone 2</th>
                                <th class="px-2 py-1">Phone 3</th>
                                <th class="px-2 py-1">Alamat</th>
                                <th class="px-2 py-1">Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            {{-- <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">John Doe</td>
                                <td class="px-2 py-0">johndoe@example.com</td>
                                <td class="px-2 py-0">081234567890</td>
                                <td class="px-2 py-0">081234567891</td>
                                <td class="px-2 py-0">081234567892</td>
                                <td class="px-2 py-0">Jl. Merdeka No. 1, Jakarta</td>
                                <td class="px-2 py-0">PT. Maju Jaya</td>
                            </tr> --}}
                            @foreach ($owners as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->name }}</td>
                                    <td class="px-2 py-0">{{ $item->email }}</td>
                                    <td class="px-2 py-0">{{ $item->phone_1 }}</td>
                                    <td class="px-2 py-0">{{ $item->phone_2 }}</td>
                                    <td class="px-2 py-0">{{ $item->phone_3 }}</td>
                                    <td class="px-2 py-0">{{ $item->address }}</td>
                                    <td class="px-2 py-0">{{ $item->corporate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

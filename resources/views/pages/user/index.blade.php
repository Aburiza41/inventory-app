<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Pengguna') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="mb-4">
                        <form method="GET" action="{{ route('user.index') }}">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                            <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Nama</th>
                                <th class="px-2 py-1">Email</th>
                                <th class="px-2 py-1">Phone</th>
                                <th class="px-2 py-1">Role</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @foreach ($users as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->name }}</td>
                                    <td class="px-2 py-0">{{ $item->email }}</td>
                                    <td class="px-2 py-0">{{ $item->phone }}</td>
                                    <td class="px-2 py-0">{{ $item->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-5">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

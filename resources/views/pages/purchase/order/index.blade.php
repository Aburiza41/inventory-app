<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Rencana Pembelian') }}
            </h2>

            <div class="flex gap-4">
                <a href="{{ route('purchase_order.create') }}"
                    class="px-4 py-2 rounded bg-gray-500 text-white flex justify-between align-middle">
                    <span class="me-2 text-white font-bold">Buat Daftar Rencana Belanja Baru</span>
                    <box-icon name='send' color="#EB3678" class="bg-white rounded"></box-icon>
                </a>

                <a href="{{ route('purchase_order.export') }}"
                    class="px-4 py-2 rounded bg-gray-500 text-white flex justify-between align-middle">
                    <i class='bx bx-printer text-xl' ></i>
                </a>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="mb-4">
                        <form method="GET" action="{{ route('purchase_order.index') }}" class="flex gap-4">
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
                                <th class="px-2 py-1">Owner</th>
                                <th class="px-2 py-1">Pekerjaan</th>
                                <th class="px-2 py-1">Nama Barang</th>
                                <th class="px-2 py-1">Vol</th>
                                <th class="px-2 py-1">Sat</th>
                                <th class="px-2 py-1">Estimasi Harga Satuan</th>
                                <th class="px-2 py-1">Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @foreach ($ProjectMaterialLists as $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->project->owner->name }}</td>
                                    <td class="px-2 py-0">{{ $item->project->title }}</td>
                                    <td class="px-2 py-0">{{ $item->material->title }}</td>
                                    <td class="px-2 py-0">{{ $item->quantity }}</td>
                                    <td class="px-2 py-0">{{ $item->unit }}</td>
                                    <td class="px-2 py-0">{{ $item->price }}</td>
                                    <td class="px-2 py-0">
                                        @if ($item->status === "PO")
                                            <a href="{{ route('project_material_list.edit', $item->uuid) }}" class="text-blue-600 hover:underline">Ubah</a>
                                            |
                                            <form action="{{ route('project_material_list.destroy', $item->uuid) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin membatalkan daftar penjualan ini?')">Batal</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="mt-5">
                        {{ $ProjectMaterialLists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Proyek ' . $item->title . 'dari ' . $item->owner->name) }}
            </h2>

            {{-- <a href="{{ route('purchase.create') }}"
                class="px-4 py-2 rounded bg-gray-500 text-white flex justify-between align-middle">
                <span class="me-2 text-white font-bold">Buat Daftar Belanja</span>
                <box-icon name='send' color="#EB3678" class="bg-white rounded"></box-icon>
            </a> --}}
            <div>
                <p class="p-1 bg-gray-500 rounded text-white">
                    {{ Str::title($item->status) }}
                </p>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        @php
            $jumlah = 0;
            $estimasi = 0;
            $total = 0;

            foreach ($item->project_material_lists as $k_project_material_list => $v_project_material_list) {
                // dd($v_project_material_list->material_order_list->discount);
                try {
                    $jumlah += $v_project_material_list->quantity;
                    $estimasi += $v_project_material_list->price * $v_project_material_list->quantity;
                    $total +=
                        ($v_project_material_list->material_order_list->price -
                            $v_project_material_list->material_order_list->discount) *
                        $v_project_material_list->quantity;
                } catch (\Throwable $th) {
                    //throw $th;
                    //                                         \Log::error($th);
                    // dd($th->getMessage());
                }
            }
            // dd($estimasi)
        @endphp

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="mb-4">
                        <h1>Estimasi : {{ 'Rp ' . number_format($estimasi, 0, ',', '.') }} </h1>
                        <h1>Total : {{ 'Rp ' . number_format($total, 0, ',', '.') }}</h1>
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-500 bg-gray-500 text-white">
                            <tr>
                                <th class="px-2 py-1">Bahan</th>
                                <th class="px-2 py-1">Satuan</th>
                                <th class="px-2 py-1">Jumlah</th>
                                <th class="px-2 py-1">Estimasi</th>
                                <th class="px-2 py-1">Jenis Beli</th>
                                <th class="px-2 py-1">Harga Beli</th>
                                <th class="px-2 py-1">Diskon</th>
                                <th class="px-2 py-1">Supplier</th>
                                <th class="px-2 py-1">Nota</th>
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
                            @foreach ($item->project_material_lists as $k => $item)
                                <tr class="border-b border-gray-500">
                                    <td class="px-2 py-0">{{ $item->material->title }}</td>
                                    <td class="px-2 py-0">{{ $item->unit }}</td>
                                    <td class="px-2 py-0">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ 'Rp ' . number_format($item->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ $v_project_material_list->material_order_list->brand }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ 'Rp ' . number_format($v_project_material_list->material_order_list->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ 'Rp ' . number_format($v_project_material_list->material_order_list->discount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ $v_project_material_list->material_order_list->material_order->supplier->name }}
                                    </td>
                                    <td class="px-2 py-0">
                                        {{ $v_project_material_list->material_order_list->material_order->buyer_number_invoice }}
                                    </td>
                                    <td>
                                        <!-- Modal toggle -->
                                        <button data-modal-target="default-modal{{ $k }}" data-modal-toggle="default-modal{{ $k }}"
                                            type="button">
                                            Lihat
                                            {{-- <i class="bx bxs-show"></i> --}}
                                        </button>

                                        <!-- Main modal -->
                                        <div id="default-modal{{ $k }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Bukti Pembayaran
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="default-modal{{ $k }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <img src="{{ Storage::url($v_project_material_list->material_order_list->material_order->image) }}" alt="">

                                                        {{-- <img src="{{ asset('storage/bukti_pemabayaran'. $v_project_material_list->material_order_list->material_order->image) }}" alt=""> --}}
                                                        {{-- <p
                                                            class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            The European Union’s General Data Protection Regulation
                                                            (G.D.P.R.) goes into effect on May 25 and is meant to ensure
                                                            a common set of data rights in the European Union. It
                                                            requires organizations to notify users as soon as possible
                                                            of high-risk data breaches that could personally affect
                                                            them.
                                                        </p> --}}
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        {{-- <button d.</button> --}}
                                                        {{-- <button data-modal-hide="default-modal" type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{-- {{ $projects->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Supplier') }}
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
                                <th class="px-2 py-1">Toko/Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Andi Wijaya</td>
                                <td class="px-2 py-0">andi.wijaya@example.com</td>
                                <td class="px-2 py-0">081234567890</td>
                                <td class="px-2 py-0">081298765432</td>
                                <td class="px-2 py-0">085677889900</td>
                                <td class="px-2 py-0">Jl. Merdeka No. 1, Jakarta</td>
                                <td class="px-2 py-0">Toko Bangunan Sejahtera</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Budi Santoso</td>
                                <td class="px-2 py-0">budi.santoso@example.com</td>
                                <td class="px-2 py-0">081234567891</td>
                                <td class="px-2 py-0">081298765433</td>
                                <td class="px-2 py-0">085677889901</td>
                                <td class="px-2 py-0">Jl. Sudirman No. 12, Surabaya</td>
                                <td class="px-2 py-0">PT. Sinar Terang</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Citra Dewi</td>
                                <td class="px-2 py-0">citra.dewi@example.com</td>
                                <td class="px-2 py-0">081234567892</td>
                                <td class="px-2 py-0">081298765434</td>
                                <td class="px-2 py-0">085677889902</td>
                                <td class="px-2 py-0">Jl. Pahlawan No. 5, Bandung</td>
                                <td class="px-2 py-0">CV. Maju Jaya</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Dedi Saputra</td>
                                <td class="px-2 py-0">dedi.saputra@example.com</td>
                                <td class="px-2 py-0">081234567893</td>
                                <td class="px-2 py-0">081298765435</td>
                                <td class="px-2 py-0">085677889903</td>
                                <td class="px-2 py-0">Jl. Ahmad Yani No. 8, Medan</td>
                                <td class="px-2 py-0">PT. Karya Utama</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Eka Sari</td>
                                <td class="px-2 py-0">eka.sari@example.com</td>
                                <td class="px-2 py-0">081234567894</td>
                                <td class="px-2 py-0">081298765436</td>
                                <td class="px-2 py-0">085677889904</td>
                                <td class="px-2 py-0">Jl. Gatot Subroto No. 2, Semarang</td>
                                <td class="px-2 py-0">Toko Material Murni</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Fajar Nugroho</td>
                                <td class="px-2 py-0">fajar.nugroho@example.com</td>
                                <td class="px-2 py-0">081234567895</td>
                                <td class="px-2 py-0">081298765437</td>
                                <td class="px-2 py-0">085677889905</td>
                                <td class="px-2 py-0">Jl. Gajah Mada No. 4, Yogyakarta</td>
                                <td class="px-2 py-0">CV. Amanah Bersama</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Gina Lestari</td>
                                <td class="px-2 py-0">gina.lestari@example.com</td>
                                <td class="px-2 py-0">081234567896</td>
                                <td class="px-2 py-0">081298765438</td>
                                <td class="px-2 py-0">085677889906</td>
                                <td class="px-2 py-0">Jl. Asia Afrika No. 7, Palembang</td>
                                <td class="px-2 py-0">PT. Makmur Sentosa</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Hadi Supriyanto</td>
                                <td class="px-2 py-0">hadi.supriyanto@example.com</td>
                                <td class="px-2 py-0">081234567897</td>
                                <td class="px-2 py-0">081298765439</td>
                                <td class="px-2 py-0">085677889907</td>
                                <td class="px-2 py-0">Jl. Pemuda No. 9, Malang</td>
                                <td class="px-2 py-0">Toko Bahan Bangunan Abadi</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Indah Permata</td>
                                <td class="px-2 py-0">indah.permata@example.com</td>
                                <td class="px-2 py-0">081234567898</td>
                                <td class="px-2 py-0">081298765440</td>
                                <td class="px-2 py-0">085677889908</td>
                                <td class="px-2 py-0">Jl. Diponegoro No. 10, Makassar</td>
                                <td class="px-2 py-0">PT. Mitra Bersama</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Joko Riyadi</td>
                                <td class="px-2 py-0">joko.riyadi@example.com</td>
                                <td class="px-2 py-0">081234567899</td>
                                <td class="px-2 py-0">081298765441</td>
                                <td class="px-2 py-0">085677889909</td>
                                <td class="px-2 py-0">Jl. Merapi No. 3, Denpasar</td>
                                <td class="px-2 py-0">CV. Sentosa Jaya</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Andi Pratama</td>
                                <td class="px-2 py-0">andi.pratama@example.com</td>
                                <td class="px-2 py-0">081234567890</td>
                                <td class="px-2 py-0">Admin</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Budi Santoso</td>
                                <td class="px-2 py-0">budi.santoso@example.com</td>
                                <td class="px-2 py-0">081234567891</td>
                                <td class="px-2 py-0">Project Estimator</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Citra Dewi</td>
                                <td class="px-2 py-0">citra.dewi@example.com</td>
                                <td class="px-2 py-0">081234567892</td>
                                <td class="px-2 py-0">Admin</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Dedi Saputra</td>
                                <td class="px-2 py-0">dedi.saputra@example.com</td>
                                <td class="px-2 py-0">081234567893</td>
                                <td class="px-2 py-0">Project Estimator</td>
                            </tr>
                            <tr class="border-b border-gray-500">
                                <td class="px-2 py-0">Eka Sari</td>
                                <td class="px-2 py-0">eka.sari@example.com</td>
                                <td class="px-2 py-0">081234567894</td>
                                <td class="px-2 py-0">Admin</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

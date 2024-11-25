<x-admin-backend-layout>
    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Data KK
                </h1>
                <div class="text-sm sm:text-base">
                    <ol class="list-none p-0 inline-flex space-x-2">
                        <li class="flex items-center">
                            <a href="/admin/dashboard"
                                class="text-gray-600 hover:text-blue-500 transition-colors duration-300">
                                {{ config('texts.nama_desa') }}
                            </a>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Data Penduduk</p>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">KK</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{ route('kk.create') }}"
                    class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">Tambah Data</a>
            </div>
        </div>

        <div class="mb-4">
            <input type="text" id="search" class="px-4 py-2 border border-gray-300 rounded-md w-full sm:w-1/3"
                placeholder="Cari berdasarkan nomor atau nama kepala keluarga..." onkeyup="searchData()">
        </div>

        @if (isset($kks) && $kks->isNotEmpty())
            <div class="overflow-x-auto">
                <table id="kkTable"
                    class="min-w-full table-auto bg-white border border-gray-200 rounded-md shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nomor KK</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Kepala Keluarga</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($kks as $kk)
                            <tr class="kk-row hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $kk->nomor }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $kk->kepala_keluarga }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 flex space-x-4">
                                    <a href="{{ route('kk.edit', $kk->id) }}"
                                        class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <button class="text-red-500 hover:text-red-700"
                                        onclick="openDeleteModal({{ $kk->id }})">Hapus</button>
                                </td>
                            </tr>
                            <x-delete-modal :id="$kk->id" :name="$kk->nomor" :action="route('kk.destroy', $kk->id)" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">Tidak ada data KK.</p>
        @endif
    </div>

    <script>
        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/admin/data-penduduk/kk/' + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function searchData() {
            let input = document.getElementById('search').value.toLowerCase();
            document.querySelectorAll('.kk-row').forEach(function(row) {
                let nomor = row.cells[0].textContent.toLowerCase();
                let kepala_keluarga = row.cells[1].textContent.toLowerCase();
                row.style.display = nomor.includes(input) || kepala_keluarga.includes(input) ? '' : 'none';
            });
        }
    </script>
</x-admin-backend-layout>

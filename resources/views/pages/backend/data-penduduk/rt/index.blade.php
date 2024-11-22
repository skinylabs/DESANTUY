<x-admin-backend-layout>
    <div class="container mx-auto p-6">


        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Data RT
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
                            <p class="text-gray-800">RT</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{ route('rt.create') }}"
                    class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">Tambah Data</a>
            </div>
        </div>

        <!-- Kolom Pencarian -->
        <div class="mb-4">
            <input type="text" id="search" class="px-4 py-2 border border-gray-300 rounded-md w-full sm:w-1/3"
                placeholder="Cari berdasarkan RT atau RW..." onkeyup="searchData()">
        </div>

        <!-- Tabel untuk Admin -->
        @if (isset($rts) && $rts->isNotEmpty())
            <div class="overflow-x-auto">
                <table id="rtTable"
                    class="min-w-full table-auto bg-white border border-gray-200 rounded-md shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">RT</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">RW</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Dusun</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($rts as $rt)
                            <tr class="rt-row hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $rt->nomer_rt }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $rt->rw->nomer_rw }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $rt->rw->dusun->nama_dusun }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 flex space-x-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('data-admin.edit', $rt->id) }}"
                                        class="text-blue-500 hover:text-blue-700">Edit</a>

                                    <!-- Tombol Hapus -->
                                    <button class="text-red-500 hover:text-red-700"
                                        onclick="openDeleteModal({{ $rt->id }})">Hapus</button>
                                </td>
                            </tr>

                            <!-- Komponen Modal Hapus -->
                            <x-delete-modal :id="$rt->id" :name="$rt->name" :action="route('data-admin.destroy', $rt->id)" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">Tidak ada data RT.</p>
        @endif
    </div>

    <!-- Modal untuk konfirmasi hapus -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
            <div class="text-lg mb-4">
                <strong>Apakah Anda yakin ingin menghapus data ini?</strong>
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex space-x-4">
                    <button type="button"
                        class="px-4 py-2 bg-gray-400 text-white rounded-md text-sm hover:bg-gray-500 transition"
                        onclick="closeDeleteModal()">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-md text-sm hover:bg-red-600 transition">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk membuka dan menutup modal -->
    <script>
        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/admin/data-penduduk/rt/' + id;
        }

        // Fungsi untuk menutup modal konfirmasi hapus
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Fungsi untuk pencarian real-time (berdasarkan RT atau RW)
        function searchData() {
            let input = document.getElementById('search');
            let filter = input.value.toLowerCase();
            let rows = document.querySelectorAll('.rt-row');

            rows.forEach(function(row) {
                let rt = row.cells[0].textContent.toLowerCase();
                let rw = row.cells[1].textContent.toLowerCase();

                // Jika RT atau RW berisi karakter pencarian, tampilkan baris
                if (rt.includes(filter) || rw.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</x-admin-backend-layout>

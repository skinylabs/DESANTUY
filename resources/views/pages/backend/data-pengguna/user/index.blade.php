<x-admin-backend-layout>
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Data Masyarakat
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
                            <p class="text-gray-800">Data Pengguna</p>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Masyarakat</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{ route('data-admin.create') }}"
                    class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">Tambah Data</a>
            </div>
        </div>

        <!-- Kolom Pencarian (Kiri) -->
        <div class="mb-4">
            <input type="text" id="search" class="px-4 py-2 border border-gray-300 rounded-md w-full sm:w-1/3"
                placeholder="Cari berdasarkan nama atau email..." onkeyup="searchData()">
        </div>

        <!-- Tabel untuk Masyarakat -->
        @if (isset($users) && $users->isNotEmpty())
            <div class="overflow-x-auto">
                <table id="userTable"
                    class="min-w-full table-auto bg-white border border-gray-200 rounded-md shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Role</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $u)
                            <tr class="user-row hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $u->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $u->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $u->role }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 flex space-x-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('data-user.edit', $u->id) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="text-red-500 hover:text-red-700"
                                        onclick="openDeleteModal({{ $u->id }})">
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                            <!-- Komponen Modal Hapus -->
                            <x-delete-modal :id="$u->id" :name="$u->name" :action="route('data-user.destroy', $u->id)" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">Tidak ada data masyarakat.</p>
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
            document.getElementById('deleteForm').action = '/data-user/' + id;
        }

        // Fungsi untuk menutup modal konfirmasi hapus
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Fungsi untuk pencarian real-time (berdasarkan nama atau email)
        function searchData() {
            let input = document.getElementById('search');
            let filter = input.value.toLowerCase();
            let rows = document.querySelectorAll('.user-row');

            rows.forEach(function(row) {
                let name = row.cells[0]?.textContent.toLowerCase();
                let email = row.cells[1]?.textContent.toLowerCase();

                // Jika nama atau email berisi karakter pencarian, tampilkan baris
                if (name && email && (name.includes(filter) || email.includes(filter))) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</x-admin-backend-layout>

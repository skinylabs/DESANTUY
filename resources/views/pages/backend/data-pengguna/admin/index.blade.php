<x-backend-layout>
    <div class="container">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Data Admin
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
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Admin</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{ route('data_user.create') }}" class="addButton">Tambah Data </a>
            </div>
        </div>

        <!-- Tabel untuk Masyarakat -->
        @if (isset($users) && $users->isNotEmpty())
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td class="px-4 py-2">{{ $u->name }}</td>
                            <td class="px-4 py-2">{{ $u->email }}</td>
                            <td class="px-4 py-2">{{ $u->role }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('data_user.edit', $u->id) }}"
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
                        <x-delete-modal :id="$u->id" :name="$u->name" :action="route('data_user.destroy', $u->id)" />
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">Tidak ada data masyarakat.</p>
        @endif
    </div>

    <!-- Modal untuk konfirmasi hapus -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-lg w-96">
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
            document.getElementById('deleteModal-' + id).classList.remove('hidden');
        }

        // Fungsi untuk menutup modal konfirmasi hapus
        function closeDeleteModal(id) {
            document.getElementById('deleteModal-' + id).classList.add('hidden');
        }
    </script>
</x-backend-layout>

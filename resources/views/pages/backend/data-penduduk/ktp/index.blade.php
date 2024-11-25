<x-admin-backend-layout>
    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Data KTP
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
                            <p class="text-gray-800">KTP</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{ route('ktp.create') }}"
                    class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">Tambah Data</a>
            </div>
        </div>

        <div class="mb-4">
            <input type="text" id="search" class="px-4 py-2 border border-gray-300 rounded-md w-full sm:w-1/3"
                placeholder="Cari berdasarkan nomor atau nama KTP..." onkeyup="searchData()">
        </div>

        @if (isset($ktps) && $ktps->isNotEmpty())
            <div class="overflow-x-auto">
                <table id="ktpTable"
                    class="min-w-full table-auto bg-white border border-gray-200 rounded-md shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nomor KTP</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nama Pemilik</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Tanggal Lahir</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Alamat</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nomor KK</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($ktps as $ktp)
                            <tr class="ktp-row hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $ktp->nik }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $ktp->nama }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $ktp->jenis_kelamin }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $ktp->tanggal_lahir }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $ktp->alamat }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $ktp->no_kk }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 flex space-x-4">
                                    <a href="{{ route('ktp.edit', $ktp->id) }}"
                                        class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <button class="text-red-500 hover:text-red-700"
                                        onclick="openDeleteModal({{ $ktp->id }})">Hapus</button>
                                </td>
                            </tr>
                            <x-delete-modal :id="$ktp->id" :name="$ktp->nik" :action="route('ktp.destroy', $ktp->id)" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">Tidak ada data KTP.</p>
        @endif
    </div>

    <script>
        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/admin/data-penduduk/ktp/' + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function searchData() {
            let input = document.getElementById('search').value.toLowerCase();
            document.querySelectorAll('.ktp-row').forEach(function(row) {
                let nomor = row.cells[0].textContent.toLowerCase();
                let nama = row.cells[1].textContent.toLowerCase();
                row.style.display = nomor.includes(input) || nama.includes(input) ? '' : 'none';
            });
        }
    </script>
</x-admin-backend-layout>

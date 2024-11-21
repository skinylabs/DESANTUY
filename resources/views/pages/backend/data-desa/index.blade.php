<x-admin-backend-layout>
    <div class="container">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Data Desa {{ config('texts.nama_desa') }}
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
                            <p class="text-gray-800">Data Desa</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                @if ($isDataDesaExist)
                    <button class="addButton opacity-50 cursor-not-allowed" disabled
                        title="Data sudah ada, tidak bisa ditambah lagi">
                        Tambah Data
                    </button>
                @else
                    <a href="{{ route('data-desa.create') }}" class="addButton">
                        Tambah Data
                    </a>
                @endif
            </div>
        </div>

        <div class="flex w-full justify-between gap-6 mt-8">
            @if ($isDataDesaExist)
                @foreach ($dataDesa as $desa)
                    <div class="flex w-full">
                        <div class="w-1/4">
                            <!-- Gambar yang bisa diklik untuk melihat di modal -->
                            <img src="{{ asset('storage/' . $desa->logo) }}" alt="Logo"
                                class="w-full h-40 object-cover rounded-lg cursor-pointer"
                                onclick="openImageModal('{{ asset('storage/' . $desa->logo) }}')">
                        </div>

                        <div class="w-3/4 pl-4">
                            <div class="text-2xl font-semibold text-slate-800">{{ $desa->nama_desa }}</div>

                            <div class="mt-3 space-y-2">
                                <div class="grid grid-cols-4 text-lg text-gray-600">
                                    <span class="font-semibold">No HP</span>
                                    <span class="text-center">:</span>
                                    <span class="col-span-2 break-words">{{ $desa->nomer_hp }}</span>
                                </div>
                                <div class="grid grid-cols-4 text-lg text-gray-600">
                                    <span class="font-semibold">Alamat</span>
                                    <span class="text-center">:</span>
                                    <span class="col-span-2 break-words">{{ $desa->alamat }}</span>
                                </div>
                                <div class="grid grid-cols-4 text-lg text-gray-600">
                                    <span class="font-semibold">Email</span>
                                    <span class="text-center">:</span>
                                    <span class="col-span-2 break-words">{{ $desa->email }}</span>
                                </div>
                            </div>

                            <div class="mt-3 flex space-x-2">
                                <a href="{{ route('data-desa.edit', $desa->id) }}"
                                    class="px-4 py-2 bg-yellow-500 text-white rounded-md text-sm hover:bg-yellow-600 transition">
                                    Edit
                                </a>

                                <!-- Tombol Hapus, yang akan memicu modal konfirmasi -->
                                <button
                                    class="px-4 py-2 bg-red-500 text-white rounded-md text-sm hover:bg-red-600 transition"
                                    onclick="openDeleteModal({{ $desa->id }})">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk konfirmasi hapus -->
                    <div id="deleteModal-{{ $desa->id }}"
                        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
                        <div class="bg-white p-4 rounded-lg w-96">
                            <div class="text-lg mb-4">
                                <strong>Apakah Anda yakin ingin menghapus desa {{ $desa->nama_desa }}?</strong>
                            </div>
                            <form action="{{ route('data-desa.destroy', $desa->id) }}" method="POST"
                                id="deleteForm-{{ $desa->id }}">
                                @csrf
                                @method('DELETE')
                                <div class="flex space-x-4">
                                    <button type="button"
                                        class="px-4 py-2 bg-gray-400 text-white rounded-md text-sm hover:bg-gray-500 transition"
                                        onclick="closeDeleteModal({{ $desa->id }})">
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
                    <!-- Komponen Modal Hapus -->
                    <x-delete-modal :id="$desa->id" :name="$desa->name" :action="route('data-desa.destroy', $desa->id)" />
                @endforeach
            @else
                <div class="col-span-full text-center text-gray-600">
                    Tidak ada data desa.
                </div>
            @endif
        </div>
    </div>

    <!-- Modal untuk melihat gambar -->
    <div id="imageModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-lg w-96 max-w-screen-lg">
            <div class="flex justify-end">
                <button onclick="closeImageModal()"
                    class="text-4xl font-bold text-gray-700 hover:text-red-500">&times;</button>
            </div>
            <img id="modalImage" src="" alt="Desa Logo" class="w-full h-auto rounded-md" />
        </div>
    </div>

    <!-- Script untuk membuka dan menutup modal -->
    <script>
        // Fungsi untuk membuka modal gambar
        function openImageModal(imageUrl) {
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('modalImage').src = imageUrl;
        }

        // Fungsi untuk menutup modal gambar
        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        // Fungsi untuk membuka modal konfirmasi hapus
        function openDeleteModal(id) {
            document.getElementById('deleteModal-' + id).classList.remove('hidden');
        }

        // Fungsi untuk menutup modal konfirmasi hapus
        function closeDeleteModal(id) {
            document.getElementById('deleteModal-' + id).classList.add('hidden');
        }
    </script>
</x-admin-backend-layout>

<x-admin-backend-layout>
    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-semibold text-slate-800">
                    Tambah Data KTP
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
                            <a href="{{ route('ktp.index') }}" class="text-gray-600 hover:text-blue-500">Data KTP</a>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Tambah Data KTP</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div>
                <a href="{{ route('ktp.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Kembali</a>
            </div>
        </div>

        <form action="{{ route('ktp.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex-1">
                        <label for="nik" class="block text-sm font-medium text-gray-700">Nomor KTP</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                            class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('nik')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pemilik</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('nama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex-1">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('tanggal_lahir')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex-1">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor KK</label>
                        <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk') }}"
                            class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('no_kk')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="pas_foto" class="block text-sm font-medium text-gray-700">Nomor KK</label>
                        <input type="file" id="pas_foto" name="pas_foto" value="{{ old('npas_foto') }}"
                            class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('pas_foto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <button type="submit"
                        class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition">Simpan</button>
                    <a href="{{ route('ktp.index') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-admin-backend-layout>

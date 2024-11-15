<x-backend-layout>
    <div class="container">
        <h1>Edit Data Desa</h1>
        <form action="{{ route('data_desa.update', $dataDesa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_desa">Nama Desa</label>
                <input type="text" id="nama_desa" name="nama_desa" value="{{ old('nama_desa', $dataDesa->nama_desa) }}"
                    class="form-control" required>
                @error('nama_desa')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomer_hp">No HP</label>
                <input type="number" id="nomer_hp" name="nomer_hp" value="{{ old('nomer_hp', $dataDesa->nomer_hp) }}"
                    class="form-control" required>
                @error('nomer_hp')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" required>{{ old('alamat', $dataDesa->alamat) }}</textarea>
                @error('alamat')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $dataDesa->email) }}"
                    class="form-control" required>
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo">Logo (Jika ingin mengganti logo, upload gambar baru)</label>
                <input type="file" id="logo" name="logo" class="form-control">
                <div class="mt-2">
                    <label>Logo Saat Ini:</label><br>
                    <img src="{{ asset('storage/' . $dataDesa->logo) }}" alt="Logo Desa" width="100">
                </div>
                @error('logo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</x-backend-layout>

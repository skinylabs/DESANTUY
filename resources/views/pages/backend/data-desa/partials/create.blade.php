<x-backend-layout>
    <div class="container">
        <h1>Tambah Data Desa</h1>
        <form action="{{ route('data_desa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama Desa</label>
                <input type="text" name="nama_desa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="number" name="nomer_hp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-backend-layout>

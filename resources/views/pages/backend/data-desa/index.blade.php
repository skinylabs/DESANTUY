<x-backend-layout>
    <div class="container">
        <h1>Data Desa</h1>
        @if ($isDataDesaExist)
            <button class="btn btn-primary opacity-50 cursor-not-allowed" disabled
                title="Data sudah ada, tidak bisa ditambah lagi">Tambah Data</button>
        @else
            <a href="{{ route('data_desa.create') }}" class="btn btn-primary">Tambah Data</a>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Desa</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataDesas as $desa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $desa->nama_desa }}</td>
                        <td>{{ $desa->nomer_hp }}</td>
                        <td>{{ $desa->alamat }}</td>
                        <td>{{ $desa->email }}</td>
                        <td><img src="{{ asset('storage/' . $desa->logo) }}" alt="Logo" width="50"></td>
                        <td>
                            <a href="{{ route('data_desa.edit', $desa->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('data_desa.destroy', $desa->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-backend-layout>

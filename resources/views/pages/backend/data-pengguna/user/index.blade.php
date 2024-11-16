<x-backend-layout>
    <div class="container">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">
            Daftar Masyarakat
        </h1>

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
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                <a href="#" class="text-red-500 hover:text-red-700">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">Tidak ada data masyarakat.</p>
        @endif
    </div>
</x-backend-layout>

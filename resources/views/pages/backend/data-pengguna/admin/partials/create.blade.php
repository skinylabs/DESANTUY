<x-backend-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Register Pengguna</h1>
        <form action="{{ route('data_user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- NIK -->
            <div class="mb-6">
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" name="nik" id="nik"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('nik') }}" required>
                @error('nik')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- No HP -->
            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="phone" id="phone"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('phone') }}">
                @error('phone')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-6">
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="address" id="address"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('address') }}</textarea>
                @error('address')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Foto Profil -->
            <div class="mb-6">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                <input type="file" name="profile_picture" id="profile_picture"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('profile_picture')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('password')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-2 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('password_confirmation')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Register
            </button>
        </form>
    </div>
</x-backend-layout>

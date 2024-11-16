<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-w-4xl mx-auto p-12">
        <!-- Alert/Notification -->
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6">
            <p class="font-semibold">
                {{ __('Tolong siapakan data berikut agar mempermudah anda dalam melakukan pendaftaran') }}
            </p>
            <ul class="list-inside list-disc">
                <li>{{ __('KTP') }}</li>
                <li>{{ __('Alamat Email') }}</li>
                <li>{{ __('Foto (Untuk Foto Profil)') }}</li>
            </ul>
        </div>

        <h2 class="text-2xl font-semibold text-center mb-6">
            {{ __('Pendaftaran') }}
        </h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">

                <!-- Name -->
                <div class="w-full ">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text"
                        name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    @error('name')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="w-full ">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email"
                        name="email" value="{{ old('email') }}" required autocomplete="email" />
                    @error('email')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <!-- NIK -->
                <div class="">
                    <label for="nik" class="block text-sm font-medium text-gray-700">{{ __('NIK') }}</label>
                    <input id="nik" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text"
                        name="nik" value="{{ old('nik') }}" required />
                    @error('nik')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="">
                    <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                    <input id="phone" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text"
                        name="phone" value="{{ old('phone') }}" />
                    @error('phone')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                    <textarea id="address" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="address" rows="4">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Profile Picture -->
                <div class="col-span-2">
                    <label for="profile_picture"
                        class="block text-sm font-medium text-gray-700">{{ __('Profile Picture') }}</label>
                    <input id="profile_picture" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                        type="file" name="profile_picture" />
                    @error('profile_picture')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password"
                        name="password" required autocomplete="new-password" />
                    @error('password')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="">
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between items-center">
                    <div class="flex gap-2 items-center">
                        <p> {{ __('Sudah punya akun?') }}</p>
                        <a href="{{ route('login') }}"
                            class="text-sm text-blue-600 hover:text-blue-900 hover:underline">
                            {{ __('Masuk disini') }}
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 sm:mt-0">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>

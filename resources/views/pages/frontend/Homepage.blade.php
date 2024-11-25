<x-frontend-layout>
    <div class="flex flex-col gap-6">
        <div class="w-full flex justify-center">
            <img src="{{ asset('/images/logo/logo-desa.png') }}" alt="logo-desa" class="w-40 h-40">
        </div>
        <h1 class="text-4xl font-bold text-center">
            SISTEM INFORMASI ADMINISTRASI
            DESANTUY
        </h1>
    </div>
    <li>
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Log Out') }}
            </button>
        </form>
    </li>


</x-frontend-layout>

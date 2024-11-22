<x-admin-backend-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('message'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md z-50"
            x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            {{ session('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

</x-admin-backend-layout>

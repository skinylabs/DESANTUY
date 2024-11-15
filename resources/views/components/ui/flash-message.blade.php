@if (!empty($message))
    <!-- Cek apakah $message tidak kosong -->
    @php
        $bgColor =
            $type === 'success'
                ? 'bg-green-100 border-green-400 text-green-700'
                : 'bg-red-100 border-red-400 text-red-700';
        $progressColor = $type === 'success' ? 'bg-green-600' : 'bg-red-600';
    @endphp

    <div x-data="{ show: true, progress: 100 }" x-show="show" x-init="setTimeout(() => {
        progress = 0;
        setTimeout(() => { show = false }, 5000);
    }, 100);"
        class="fixed top-4 right-4 {{ $bgColor }} border rounded shadow-lg flex flex-col items-start z-50">

        <div class="flex justify-between items-center w-full px-4 py-3">
            <p class="flex-grow">{{ $message }}</p>
            <button @click="show = false" class="ml-4">×</button>
        </div>

        <div x-bind:style="`width: ${progress}%;`" class="toast-progress {{ $progressColor }} h-1 rounded"></div>
        <!-- Progress Bar -->
    </div>

    <script>
        // Tanpa script tambahan, semua ditangani oleh Alpine.js
    </script>
@endif

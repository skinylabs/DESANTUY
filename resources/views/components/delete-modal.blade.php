<div id="deleteModal-{{ $id }}"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-4 rounded-lg w-96">
        <div class="text-lg mb-4">
            <strong>Apakah Anda yakin ingin menghapus {{ $name }}?</strong>
        </div>
        <form action="{{ $action }}" method="POST" id="deleteForm-{{ $id }}">
            @csrf
            @method('DELETE')
            <div class="flex space-x-4">
                <button type="button"
                    class="px-4 py-2 bg-gray-400 text-white rounded-md text-sm hover:bg-gray-500 transition"
                    onclick="closeDeleteModal({{ $id }})">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded-md text-sm hover:bg-red-600 transition">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<div>
    <div class="p-6 bg-white border-gray-200 rounded-lg shadow dark:bg-gray-800">
        <div class="mb-5">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Buku</label>
            <input type="text" id="judul" wire:model='judul'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Mahabarata" />
            @error('judul')
                <small class="text-red-500 mt-1">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-5">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <select id="category" wire:model='kategori_id'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Kategori Buku</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <small class="text-red-500 mt-1">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-5">
            <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
            <input type="text" id="penulis" wire:model='penulis'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Olivia Febrianti" />
            @error('penulis')
                <small class="text-red-500 mt-1">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-5">
            <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
            <input type="text" id="penerbit" wire:model='penerbit'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Dimar" />
            @error('penerbit')
                <small class="text-red-500 mt-1">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-5">
            <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                Terbit</label>
            <input type="number" minlength="4" maxlength="4" max="{{ now()->format('Y') }}" id="tahun_terbit"
                wire:model='tahun_terbit'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="1979" />
            @error('tahun_terbit')
                <small class="text-red-500 mt-1">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-5">
            <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
            <input type="number" id="stok" wire:model='stok'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="200" />
            @error('stok')
                <small class="text-red-500 mt-1">{{ $message }}</small>
            @enderror
        </div>
        <button wire:click='updateBuku({{ $book->id }})'
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
            Buku</button>
        <button wire:click='hapusBuku({{ $book->id }})'
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus
            Buku</button>
    </div>
</div>

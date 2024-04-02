<div>
    <div
        class="grid grid-cols-2 p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="">
            <h1 class="text-2xl font-bold mb-4">Detail Buku</h1>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Judul: </span> {{ $book->judul }}
            </p>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Kategori: </span> {{ $book->kategori->name }}

            </p>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Penulis: </span> {{ $book->penulis }}

            </p>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Penerbit: </span> {{ $book->penerbit }}

            </p>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Tahun Terbit: </span> {{ $book->tahun_terbit }}

            </p>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Stok: </span> {{ $book->stok }}

            </p>
            <p class="text-gray-700 mb-2 dark:text-gray-400">
                <span class="font-bold text-white">Tersedia: </span> {{ $tersedia }}
            </p>
            @if ($isFavorite)
                <button type="button" wire:click="toggleFavorite({{ $book->id }})"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Hapus Dari Koleksi Pribadi</button>
            @else
                <button type="button" wire:click="toggleFavorite({{ $book->id }})"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambahkan
                    Ke Koleksi
                    Pribadi</button>
            @endif
        </div>

        <div>
            <h1 class="text-2xl font-bold mb-4">Peminjaman Buku</h1>
            <div class="mb-5">
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banyak Buku
                    Yang Ingin Dipinjam</label>
                <input type="number" id="amount" wire:model='amount' max="{{ $tersedia }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="20" />
                @error('amount')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-5">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banyak Buku
                    Tanggal Pengembalian</label>
                <input type="date" id="date" min="{{ date('Y-m-d') }}" wire:model='date'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="20" />
                @error('date')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <button wire:click='pinjamBuku'
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam
                Buku</button>
        </div>
    </div>
    <div
        class="grid grid-cols-1 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-5">
            <h1 class="text-2xl font-bold mb-4">Ulasan Buku</h1>
            <div class="mb-5">
                <label for="fieldUlasan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambah
                    Ulasan
                    Buku</label>
                <input type="text" id="fieldUlasan" wire:model='fieldUlasan'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ini Keren Banget" />
                @error('fieldUlasan')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <button wire:click='tambahUlasan'
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                Ulasan</button>
        </div>
        <h3>Ulasan: </h3>
        <ul>
            @foreach ($ulasans as $ulasan)
                <div class="flex items-start gap-2.5 mb-5">
                    <div
                        class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <span
                                class="text-sm font-semibold text-gray-900 dark:text-white">{{ $ulasan->user->name }}</span>
                            <span
                                class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $ulasan->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ $ulasan->ulasan }}</p>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
</div>

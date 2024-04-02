<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penulis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penerbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tahun Terbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tersedia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($koleksis as $koleksi)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $koleksi->buku->judul }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $koleksi->buku->kategori->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $koleksi->buku->penulis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $koleksi->buku->penerbit }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $koleksi->buku->tahun_terbit }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $koleksi->buku->stok }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $koleksi->buku->stok - $pinjams->where('buku_id', $koleksi->buku->id)->sum('amount') }}
                        </td>
                        <td class="px-6 py-4">
                            @can('user')
                                @if ($koleksi->buku->stok - $pinjams->where('buku_id', $koleksi->buku->id)->sum('amount') == 0)
                                    <a class="font-medium text-gray-600 dark:text-gray-500">Pinjam Buku</a>
                                @else
                                    <a href="/pinjambuku/{{ $koleksi->buku->id }}" wire:navigate
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Pinjam Buku</a>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

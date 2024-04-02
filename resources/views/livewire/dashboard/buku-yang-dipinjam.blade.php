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
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Banyak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Kembali
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjams as $pinjam)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pinjam->buku->judul }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pinjam->buku->kategori->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pinjam->buku->penulis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pinjam->buku->penerbit }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pinjam->buku->tahun_terbit }}
                        </td>
                        <td class="px-6 py-4">

                            @if ($pinjam->status == 'dipinjam')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Dipinjam</span>
                            @else
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Dikembalikan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $pinjam->amount }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d-m-Y', $pinjam->tgl_pinjam) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d-m-Y', $pinjam->tgl_kembali) }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($pinjam->status == 'dipinjam')
                                <button type="button" wire:click="returnBook({{ $pinjam->id }})"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-0.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembalikan
                                    Buku</button>
                            @else
                                <button
                                    class="text-white bg-gray-700 font-medium rounded-lg text-sm px-2 py-0.5 dark:bg-gray-600">Kembalikan
                                    Buku</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

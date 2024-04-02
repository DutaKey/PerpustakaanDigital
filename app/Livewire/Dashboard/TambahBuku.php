<?php

namespace App\Livewire\Dashboard;

use App\Models\Buku;
use App\Models\Kategori;
use Livewire\Attributes\Title;
use Livewire\Component;

class TambahBuku extends Component
{

    #[Title('Tambah Buku')]

    public $judul;
    public $kategori_id;
    public $penulis;
    public $penerbit;
    public $tahun_terbit;
    public $stok;
    public $categories;

    public function mount()
    {
        $this->categories = Kategori::all();
    }

    public function tambahBuku()
    {
        $this->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
        ]);

        Buku::create([
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'stok' => $this->stok,
            'kategori_id' => $this->kategori_id,
        ]);

        return redirect()->route('dashboard')->success('Buku berhasil ditambahkan👍');
    }
    public function render()
    {
        return view('livewire.dashboard.tambah-buku');
    }
}

<?php

namespace App\Livewire\Dashboard;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pinjam;
use App\Models\KoleksiPribadi;
use App\Models\Ulasan;
use Livewire\Attributes\Title;
use Livewire\Component;

class KelolaBuku extends Component
{
    #[Title('Kelola Buku')]

    public $book;
    public $judul;
    public $kategori_id;
    public $penulis;
    public $penerbit;
    public $tahun_terbit;
    public $stok;
    public $categories;
    public $pinjams;

    public function mount($id)
    {
        $this->book = Buku::find($id);
        $this->categories = Kategori::all();
        $this->judul = $this->book->judul;
        $this->kategori_id = $this->book->kategori_id;
        $this->penulis = $this->book->penulis;
        $this->penerbit = $this->book->penerbit;
        $this->tahun_terbit = $this->book->tahun_terbit;
        $this->stok = $this->book->stok;
    }

    public function updateBuku($id)
    {
        $this->book = Buku::find($id);
        $this->book->update([
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'stok' => $this->stok,
            'kategori_id' => $this->kategori_id,
        ]);
        return redirect()->back()->success('Data Buku Berhasil Diperbarui👍');
    }

    public function hapusBuku($id)
    {
        Pinjam::where('buku_id', $id)->delete();
        Ulasan::where('buku_id', $id)->delete();
        KoleksiPribadi::where('buku_id', $id)->delete();
        $this->book = Buku::find($id);
        $this->book->delete();
        return redirect()->route('dashboard')->success('Buku Berhasil Dihapus👍');
    }

    public function render()
    {
        return view('livewire.dashboard.kelola-buku');
    }
}

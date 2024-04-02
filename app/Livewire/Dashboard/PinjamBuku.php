<?php

namespace App\Livewire\Dashboard;

use App\Models\Buku;
use App\Models\KoleksiPribadi;
use App\Models\Pinjam;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PinjamBuku extends Component
{

    #[Title('Pinjam Buku')]

    public $book;
    public $amount;
    public $date;
    public $tersedia;
    public $isFavorite;
    public $ulasans;
    public $fieldUlasan;


    public function mount($id)
    {
        $this->book = Buku::find($id);
        $this->tersedia = $this->book->stok - Pinjam::where('buku_id', $this->book->id)->where('status', 'dipinjam')->sum('amount');
        $this->isFavorite = KoleksiPribadi::where('buku_id', $this->book->id)->where('user_id', auth()->user()->id)->exists();
        $this->ulasans = $this->book->ulasans;
    }

    public function toggleFavorite()
    {
        if ($this->isFavorite) {
            KoleksiPribadi::where('buku_id', $this->book->id)->where('user_id', auth()->user()->id)->delete();
            $this->isFavorite = false;
            return redirect()->success('Buku Berhasilamu di hapus dari favorit');
        } else {
            KoleksiPribadi::create([
                'buku_id' => $this->book->id,
                'user_id' => auth()->user()->id
            ]);
            $this->isFavorite = true;
            return redirect()->success('Buku Berasil ditambahkan ke favorit');
        }
    }

    public function tambahUlasan()
    {
        $this->validate([
            'fieldUlasan' => 'required'
        ]);
        $this->book->ulasans()->create([
            'user_id' => auth()->user()->id,
            'ulasan' => $this->fieldUlasan
        ]);
        $this->ulasans = $this->book->ulasans;

        return redirect()->back()->success('Ulasan Berhasilamu ditambahkan');
    }

    public function pinjamBuku()
    {
        $this->validate([
            'amount' => 'required|numeric|min:1',
            'date' => "required|date"
        ]);

        if ($this->amount > $this->tersedia) {
            return redirect()->back()->error('Jumlah yang dipinjam melebihi stok yang tersedia');
        }

        Pinjam::create([
            'user_id' => auth()->user()->id,
            'buku_id' => $this->book->id,
            'amount' => $this->amount,
            'status' => 'dipinjam',
            'tgl_kembali' => $this->date
        ]);

        $this->tersedia = $this->book->stok - Pinjam::where('buku_id', $this->book->id)->where('status', 'dipinjam')->sum('amount');

        return redirect()->route('dashboard')->success('Buku Berhasilamu dipinjam');
    }
    public function render()
    {
        return view('livewire.dashboard.pinjam-buku');
    }
}

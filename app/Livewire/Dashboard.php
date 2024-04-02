<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Pinjam;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Selamat Datang Di Aplikasi Perpustakaan Digital')]

    public $books = [];
    public $pinjams;

    public function mount()
    {

        $this->books = Buku::all();
        $this->pinjams = Pinjam::where('status', 'dipinjam')->get();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}

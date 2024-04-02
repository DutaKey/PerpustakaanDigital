<?php

namespace App\Livewire\Dashboard;

use App\Models\Pinjam;
use Livewire\Attributes\Title;
use Livewire\Component;

class LaporanPeminjaman extends Component
{
    #[Title('Laporan Peminjaman')]
    public $pinjams;

    public function mount()
    {
        $this->pinjams = Pinjam::all();
    }

    public function render()
    {
        return view('livewire.dashboard.laporan-peminjaman');
    }
}

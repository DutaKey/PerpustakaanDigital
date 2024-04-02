<?php

namespace App\Livewire\Dashboard;

use App\Models\KoleksiPribadi as ModelKoleksiPribadi;
use App\Models\Pinjam;
use Livewire\Attributes\Title;
use Livewire\Component;

class KoleksiPribadi extends Component
{
    #[Title('Koleksi Pribadi')]
    public $koleksis;
    public $pinjams;


    public function mount()
    {
        $this->koleksis = ModelKoleksiPribadi::where('user_id', auth()->user()->id)->with('buku')->get();
        $this->pinjams = Pinjam::where('status', 'dipinjam')->get();
    }
    public function render()
    {
        return view('livewire.dashboard.koleksi-pribadi');
    }
}

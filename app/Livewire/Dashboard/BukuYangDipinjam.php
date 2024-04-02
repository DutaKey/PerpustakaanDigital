<?php

namespace App\Livewire\Dashboard;

use App\Models\Buku;
use App\Models\Pinjam;
use Livewire\Attributes\Title;
use Livewire\Component;

class BukuYangDipinjam extends Component
{
    #[Title('Buku Yang Dipinjam')]

    public $pinjams;

    public function mount()
    {
        $this->pinjams = Pinjam::where('user_id', Auth()->user()->id)->with('buku')->get();
    }


    public function returnBook($id)
    {
        $pinjam = Pinjam::find($id);
        $pinjam->update([
            'status' => 'dikembalikan'
        ]);
        $pinjam->save();

        return redirect()->route('bukuyangdipinjam')->success('Buku Berhasil Dikembalikan👍');
    }
    public function render()
    {
        return view('livewire.dashboard.buku-yang-dipinjam');
    }
}

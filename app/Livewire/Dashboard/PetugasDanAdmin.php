<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class PetugasDanAdmin extends Component
{
    #[Title('Petugas Dan Admin')]
    public $users;

    public function mount()
    {
        $this->users = User::where('role', 'admin')->orWhere('role', 'petugas')->get();
    }
    public function render()
    {
        return view('livewire.dashboard.petugas-dan-admin');
    }

    public function hapusAkun($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->users = User::where('role', 'admin')->orWhere('role', 'petugas')->get();

        return redirect()->back()->success('Akun Berhasil Dihapus👍');
    }
}

<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class TambahAdminPetugas extends Component
{

    #[Title('Tambah Admin/Petugas')]

    public $name;
    public $email;
    public $password;
    public $role;

    public function buatAkun()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);

        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        return redirect()->route('dashboard')->success('Akun Berhasil Dibuat');
    }

    public function render()
    {
        return view('livewire.dashboard.tambah-admin-petugas');
    }
}

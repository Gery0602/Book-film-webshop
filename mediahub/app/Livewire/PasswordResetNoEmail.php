<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetNoEmail extends Component
{
    public $email;
    public $password;
    public $password_confirmation;

    protected $redirectTo = null; 

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $this->email)->first();
        $user->update([
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'A jelszó sikeresen megváltozott!');

        return redirect()->route('dashboard'); // ← normál redirect
    }

    public function render()
    {
        return view('livewire.password-reset-no-email')
            ->layout('components.layouts.auth.app-no-sidebar');
    }
}

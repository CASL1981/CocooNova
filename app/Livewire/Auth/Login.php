<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) 
    {
            session()->regenerate();
            return redirect()->intended('/');
        }

        $this->addError('email', 'Credenciales inválidas');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

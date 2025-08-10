<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required|min:6')]
    public string $password = '';

    public bool $remember = false;

    #[Title('Login')]
    #[Layout('livewire.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return $this->redirect(route('dashboard.index'), navigate: true);
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }
}

<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{

    use LivewireAlert;

    public $email, $password, $isRedirect;

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {

            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $this->alert('success', 'Login berhasil, redirecting...');
                $this->isRedirect = true;

            }else{
                $this->alert('error', 'Username atau password tidak sesuai');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

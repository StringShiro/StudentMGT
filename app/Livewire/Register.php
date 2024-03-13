<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class Register extends Component
{
    public $name;
    public $email;
    public $password;

    public function storeUser(Request $request){
        $validated = $this->validate([
            "name"=> 'required|max:100',
            'email'=> 'required|email|max:255',
            'password'=> 'required'
        ]);
        $user = User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> bcrypt($this->password)
        ]);
        Auth::login($user);
        return $this->redirect('/dashboard');
    }
    public function render()
    {
        return view('livewire.register');
    }
}

<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAccount;

class Login extends Component
{
    public $email;
    public $password;
    public $allData = [];
    // protected $rules = [
    //     'username' => 'required|min:3|max:30',
    //     'password' => 'required'
    // ];
    public function loginUser(Request $request){
        $validated = $this->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:3'
        ]);
        //   // Attempt to find the user by username
        // $user = UserAccount::where('username', $request->username)->first();

        // // Check if the user exists
        // if (!$user) {
        //     return response()->json(['error' => 'Invalid credentials'], 401);
        // }
        // return $this->redirect('/dashboard', navigate:true);
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return $this->redirect('/dashboard', navigate:true);
        }
       $this->addError('email','the email does not match');
    }
    public function render()
    {
        $this->allData = User::all();
        return view('livewire.login');
    }
}

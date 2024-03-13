<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Register;

class Forms extends Component
{
    public $name;
    public $email;
    protected $rules = [
        'name' => 'required|min:3|max:30',
        'email' => 'required'
    ];
    // public function message() {
    //     return $this->message = 'Field need to be input';
    // }
    public function submit(){
        $validateData = $this->validate();
        Register::create($validateData);
        session()->flash('success','form is submitted');
    }
    public function render()
    {
        return view('livewire.forms');
    }
}

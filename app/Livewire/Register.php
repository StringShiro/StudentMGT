<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\StudentProfile;
use Livewire\WithFileUploads;

class Register extends Component
{
    // public $name;
    // public $email;
    // public $password;
    use WithFileUploads;
    public $studentid;
    public $studentname;
    public $studentnumber;
    public $studentaddress;
    public $studentemail;
    public $studentphone;
    public $studentmajor;
    public $studentavatar;

    public function storeUser(Request $request){
        // $validated = $this->validate([
        //     "name"=> 'required|max:100',
        //     'email'=> 'required|email|max:255',
        //     'password'=> 'required'
        // ]);
        // $user = User::create([
        //     'name'=> $this->name,
        //     'email'=> $this->email,
        //     'password'=> bcrypt($this->password)
        // ]);
        // Auth::login($user);
        $validated = $this->validate([
            'studentname' => 'required',
            'studentnumber' => 'required',
            'studentaddress' => 'max:255',
            'studentemail'=> 'email|max:255',
            'studentphone' => 'max:10',
            'studentmajor' => 'required',
            'studentavatar'=> 'required|mimes:aac,ai,aiff,avi,bmp,c,cpp,csv,dat,dmg,doc,dotx,dwg,dxf,eps,exe,glv,gif,h,hpp,ics,iso,java,mp4,mid,mp4,txt,xlx,xls,pdf,jpg,png,php,css,html,js|max:1024',
        ]);
        $student = StudentProfile::create([
            'studentname'=> $this->studentname,
            'studentnumber'=> $this->studentnumber,
            'studentaddress'=> $this->studentaddress,
            'studentemail'=> $this->studentemail,
            'studentphone'=> $this->studentphone,
            'studentmajor'=> $this->studentmajor,
            'studentavatar'=> $this->studentavatar
        ]);
        session()->flash('success','profile is updated!');
        return $this->redirect('/dashboard');
    }
    public function render()
    {
        return view('livewire.register');
    }
}

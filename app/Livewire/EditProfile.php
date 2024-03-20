<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Request;

class EditProfile extends Component
{
    use WithFileUploads;
    public $studentid;
    public $studentname;
    public $studentnumber;
    public $studentaddress;
    public $studentemail;
    public $studentphone;
    public $studentmajor;
    public $studentavatar;
    public $isUpdate = false;
    public $editform = false;
    public $student;
    public $allData = [];

    public function submit(){

        return $this->redirect('/dashboard', navigate:true);
    }
    public function mount(){
        $this->student = StudentProfile::all();
    }
    public function storeUser(Request $request){
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
        //Auth::login($student);
        session()->flash('success','student is created!');
        return $this->redirect('/dashboard');
    }
    public function edit (StudentProfile $studentid){
        $data = StudentProfile::find($studentid);
        $this->studentname = $data->studentname;
        $this->studentnumber = $data->studentnumber;
        $this->studentemail = $data->studentemail;
        $this->studentphone = $data->studentphone;
        $this->studentmajor = $data->studentmajor;
        $this->studentavatar = $data->studentavatar;
        $this->isUpdate = true;
        $this->studentid = $studentid;
    }
    public function updateProfile (StudentProfile $studentid){
         $validated = $this->validate([
            'studentname' => 'required',
            'studentnumber' => 'required',
            'studentaddress' => 'max:255',
            'studentemail'=> 'email|max:255',
            'studentphone' => 'max:10',
            'studentmajor' => 'required',
            'studentavatar'=> 'required|mimes:aac,ai,aiff,avi,bmp,c,cpp,csv,dat,dmg,doc,dotx,dwg,dxf,eps,exe,glv,gif,h,hpp,ics,iso,java,mp4,mid,mp4,txt,xlx,xls,pdf,jpg,png,php,css,html,js|max:1024',
        ]);
        // $student = StudentProfile::create([
        //     'studentname'=> $this->studentname,
        //     'studentnumber'=> $this->studentnumber,
        //     'studentaddress'=> $this->studentaddress,
        //     'studentemail'=> $this->studentemail,
        //     'studentphone'=> $this->studentphone,
        //     'studentmajor'=> $this->studentmajor,
        //     'studentavatar'=> $this->studentavatar
        // ]);
        $validated = $this->validate($validated);
        $data = StudentProfile::find($this->studentid);
        $data->update($validated);
        session()->flash('success','profile is updated!');
        return $this->redirect('/dashboard');
    }
    public function close(){
        $this->reset();
    }
    #[On('edit-mode')]
    public function editForm($studentid){
        dd($studentid);
        $this->editform=true;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}

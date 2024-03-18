<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentProfile;
use Livewire\WithFileUploads;

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
    public function updateProfile (StudentProfile $studentid){
        $student = StudentProfile::find($studentid);
        $student->studentname = $this->studentname;
        $student->studentnumber = $this->studentnumber;
        $student->studentaddress = $this->studentaddress;
        $student->studentemail = $this->studentemail;
        $student->studentphone = $this->studentphone;
        $student->studentmajor = $this->studentmajor;
        $student->studentavatar = $this->studentavatar;
        if(!$studentid){
            $student->save();
            session()->flash('success', 'student profile is updated!');
        }else{
            session()->flash('fail', 'Try again!');
        }
        // $validated =$this->validate([
        //     'studentname' => 'required|max:255',
        //     'studentnumber' => 'required|max:255',
        //     'studentaddress' => 'required|max:255',
        //     'studentemail' => 'required|email|max:255',
        //     'studentphone' => 'required|max:10',
        //     'studentmajor' => 'required|max:50',
        //     'studentavatar' => 'required|mimes:aac,ai,aiff,avi,bmp,c,cpp,csv,dat,dmg,doc,dotx,dwg,dxf,eps,exe,glv,gif,h,hpp,ics,iso,java,mp4,mid,mp4,txt,xlx,xls,pdf,jpg,png,php,css,html,js|max:1024',
        // ]);
        // $this->student->update($validated);

        // $singData = StudentProfile::find($studentid);
        // $this->studentname = $singData->studentname;
        // $this->studentnumber = $singData->studentnumber;
        // $this->studentaddress = $singData->studentaddress;
        // $this->studentemail = $singData->studentemail;
        // $this->studentphone = $singData->studentphone;
        // $this->studentmajor = $singData->studentmajor;
        // $this->studentavatar = $singData->studentavatar;
        // if(!$singData){
        //     StudentProfile::updated([
        //         'studentname' => $this->studentname,
        //         'studentnumber' => $this->studentnumber,
        //         'studentaddress' => $this->studentaddress,
        //         'studentemail' => $this->studentemail,
        //         'studentphone' => $this->studentphone,
        //         'studentmajor' => $this->studentmajor,
        //         'studentavatar' => $this->studentavatar
        //     ]);
        // }
        // session()->flash('success', 'student profile is updated!');
        return $this->redirect('/dashboard', navigate:true);
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}

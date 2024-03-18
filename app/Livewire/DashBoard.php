<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashBoard extends Component
{
    public $studentid;
    public $studentname;
    public $studentnumber;
    public $studentaddress;
    public $studentemail;
    public $studentphone;
    public $studentmajor;
    public $studentavatar;
    public $isEdit = false;
    public $allData = [];

    public function submit($studentid){
        $validateData = $this->validate();
        if(!$studentid){
            $updateArray = array(
                'studentname' => $validateData['studentname'],
                'studentnumber'=> $validateData['studentnumber'],
                'studentaddress'=> $validateData['studentaddress'],
                'studentemail'=> $validateData['studentemail'],
                'studentphone'=> $validateData['studentphone'],
                'studentmajor'=> $validateData['studentmajor'],
                'studentavatar'=> $validateData['studentavatar'],
            );
            DB::table('student')->where('studentid', $studentid)->update($updateArray);
        }
        else{
            StudentProfile::create($validateData);
        }
        StudentProfile::create($validateData);
        session()->flash("success","Form is submitted");
    }
    public function addForm(){
        $this->studentname = '';
        $this->studentnumber = '';
        $this->studentaddress = '';
        $this->studentemail = '';
        $this->studentphone = '';
        $this->studentmajor = '';
        $this->studentavatar = '';
    }
    public function deleteForm(StudentProfile $student){
        //DB::table('student')->where('studentid', $studentid)->delete($studentid);
        $student->delete();
        session()->flash('success','student is deleted');
        return $this->redirect('/dashboard', navigate:true);
    }
    public function editForm(StudentProfile $studentid){
        $singData = StudentProfile::find($studentid);
        $this->studentname = $singData->studentname;
        $this->studentnumber = $singData->studentnumber;
        $this->studentaddress = $singData->studentaddress;
        $this->studentemail = $singData->studentemail;
        $this->studentphone = $singData->studentphone;
        $this->studentmajor = $singData->studentmajor;
        $this->studentavatar = $singData->studentavatar;
        if(!$singData){
            StudentProfile::updated([
                'studentname' => $this->studentname,
                'studentnumber' => $this->studentnumber,
                'studentaddress' => $this->studentaddress,
                'studentemail' => $this->studentemail,
                'studentphone' => $this->studentphone,
                'studentmajor' => $this->studentmajor,
                'studentavatar' => $this->studentavatar
            ]);
        }
        session()->flash('message', 'updated sucessfully!');
    }
    public function updateProfile (){
        // $this->isEdit = True;
        // $this->dispatchBrowserEvent('edit-profile');
        $validated =$this->validate([
            'studentname' => 'required|max:255',
            'studentnumber' => 'required|max:255',
            'studentaddress' => 'required|max:255',
            'studentemail' => 'required|email|max:255',
            'studentphone' => 'required|max:10',
            'studentmajor' => 'required|max:50',
            'studentavatar' => 'required|mimes:aac,ai,aiff,avi,bmp,c,cpp,csv,dat,dmg,doc,dotx,dwg,dxf,eps,exe,glv,gif,h,hpp,ics,iso,java,mp4,mid,mp4,txt,xlx,xls,pdf,jpg,png,php,css,html,js|max:1024',
        ]);
        $this->StudentProfile->update($validated);
        session()->flash('success', 'student profile is updated!');
        return $this->redirect('/dashboard', navigate:true);
    }

    public function updateForm(){
        return view('livewire.edit-profile');
    }
    public function render()
    {
        $this->allData = StudentProfile::all();
        return view('livewire.dash-board');
    }
}

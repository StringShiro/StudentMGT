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
    public function deleteForm($studentid){
        DB::table('student')->where('studentid', $studentid)->delete($studentid);
        session()->flash('success','student is deleted');
    }
    public function editForm($studentid){
        $singData = StudentProfile::find($studentid);
        $this->studentname = $singData->studentname;
        $this->studentnumber = $singData->studentnumber;
        $this->studentaddress = $singData->studentaddress;
        $this->studentemail = $singData->studentemail;
        $this->studentphone = $singData->studentphone;
        $this->studentmajor = $singData->studentmajor;
        $this->studentavatar = $singData->studentavatar;
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
        // session()->flash('message', 'updated sucessfully!');
    }
    public function render()
    {
        $this->allData = StudentProfile::all();
        return view('livewire.dash-board');
    }
}

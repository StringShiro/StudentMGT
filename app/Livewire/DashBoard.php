<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class DashBoard extends Component
{

    use WithFileUploads;
    public $studentid, $studentname, $studentnumber, $studentaddress, $studentemail, $studentphone, $studentmajor, $studentavatar;
    public $isUpdate = false;
    public $editform = true;
    public $allData = [];

    protected function rules(){
        return [
            'studentname' => 'required',
            'studentnumber' => 'required',
            'studentaddress' => 'max:255',
            'studentemail'=> 'email|max:255',
            'studentphone' => 'max:10',
            'studentmajor' => 'required',
            'studentavatar'=> 'required|mimes:aac,ai,aiff,avi,bmp,c,cpp,csv,dat,dmg,doc,dotx,dwg,dxf,eps,exe,glv,gif,h,hpp,ics,iso,java,mp4,mid,mp4,txt,xlx,xls,pdf,jpg,png,php,css,html,js|max:1024'
        ];
    }

    public function submit($studentid){
        $validateData = $this->validate();
        if($studentid){
            $updateArray = array(
                'studentname' => $validateData['studentname'],
                'studentnumber'=> $validateData['studentnumber'],
                'studentaddress'=> $validateData['studentaddress'],
                'studentemail'=> $validateData['studentemail'],
                'studentphone'=> $validateData['studentphone'],
                'studentmajor'=> $validateData['studentmajor'],
                'studentavatar'=> $validateData['studentavatar'],
            );
            DB::table('student')->where('id', $studentid)->update($updateArray);
        }
        else{
            StudentProfile::create($validateData);
        }
        StudentProfile::create($validateData);
        session()->flash("success","Form is submitted");
    }
    public function deleteForm(StudentProfile $student){
        //DB::table('student')->where('studentid', $studentid)->delete($studentid);
        $student->delete();
        session()->flash('success','student is deleted');
        return $this->redirect('/dashboard', navigate:true);
    }
    public function updateForm(){
        $validatedData = $this->validate();
        StudentProfile::where('id', $this->studentid)->update([
            'studentname'=> $validatedData['studentname'],
            'studentnumber'=> $validatedData['studentnumber'],
            'studentaddress'=> $validatedData['studentaddress'],
            'studentphone'=> $validatedData['studentphone'],
            'studentemail'=> $validatedData['studentemail'],
            'studentmajor'=> $validatedData['studentmajor'],
            'studentavatar'=> $validatedData['studentavatar'],
        ]);
        session()->flash('success','your profile is updated!');
        $this->resetInput();
        return $this->redirect('/dashboard', navigate:true);
    }
    public function editForm (int $studentid){
        $student = StudentProfile::find($studentid);
        if($student){
            $this->studentid = $student->id;
            $this->studentname = $student->name;
            $this->studentnumber = $student->number;
            $this->studentaddress = $student->address;
            $this->studentphone = $student->phone;
            $this->studentemail = $student->email;
            $this->studentmajor = $student->major;
            $this->studentavatar = $student->avatar;
            dd($student);
        }
        else{
            return $this->redirect('/dashboard', navigate:true);
        }
    }
    public function close(){
        $this->resetInput();
    }
    #[On('edit-mode')]
    public function edit($studentid){
        $this->editform=true;
    }
    public function render()
    {
        $this->allData = StudentProfile::all();
        return view('livewire.dash-board');
    }
}

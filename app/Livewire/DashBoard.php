<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Livewire\Component;

class DashBoard extends Component
{
    public $studentname;
    public $studentnumber;
    public $studentaddress;
    public $studentemail;
    public $studentphone;
    public $studentmajor;
    public $studentavatar;
    public $allData = [];
    public function render()
    {
        $this->allData = StudentProfile::all();
        return view('livewire.dash-board');
    }
}

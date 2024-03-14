<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentProfile;

class FileUpload extends Component
{
    public $avatar;

    public function FileUpload(){
        $validatedData = $this->validate([
            "name"=> "",
        ]);
    }
    public function render()
    {
        return view('livewire.file-upload');
    }
}

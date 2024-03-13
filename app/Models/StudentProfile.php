<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;
    protected $table = "student";
    protected $fillable = ['studentname','studentnumber','studentaddress','studentemail','studentphone','studentmajor'] ;
}

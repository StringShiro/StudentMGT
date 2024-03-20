<?php

use App\Livewire\DashBoard;
use App\Livewire\EditProfile;
use App\Livewire\FileUpload;
use App\Livewire\Forms;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::get('/forms', Forms::class);
route::get('/login', Login::class);
route::get('/dashboard', DashBoard::class);
route::get('/fileupload', FileUpload::class);
route::get('/dashboard/register', EditProfile::class);
route::get('/dashboard/edit-profile', EditProfile::class);

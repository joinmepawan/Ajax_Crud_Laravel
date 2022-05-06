<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', function () {
    return view('employee.upload');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {

        //==============CRUD Ajax with Jquery==============//
    Route::get ('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::post ('/employee', [EmployeeController::class, 'store']);
    Route::get('/deleteuser/{id}', [EmployeeController::class, 'delete']);
    Route::get('/updateusr/{id}',[EmployeeController::class, 'editblog']);
    Route::post('/updateuserr',[EmployeeController::class, 'update']);
    //=============End Crud with Ajax and Jqery==========//
   
    Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user',[AddController::class, 'index'])->name('user.add');
    
    
    // ================= create User===============
    Route::get('/addUser',[AddController::class, 'addUserGet']);
    
    Route::post('/addUser',[AddController::class, 'adduser']);
    // =========================================
    
    Route::get('/updateuser/{id}',[AddController::class, 'edit']);
    Route::post('/updateuser/{id}',[AddController::class, 'update'])->name('user.update');
    
    Route::get('/userdelete/{id}', [AddController::class, 'delete']);
    
    
    //========================Blog Start==================
    Route::get('/blog',[BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogform',[BlogController::class, 'blogget']);
    Route::post('/addblog',[BlogController::class, 'addblog']);
    Route::get('/updateblog/{id}',[BlogController::class, 'editblog']);
    Route::post('/updateblogtest',[BlogController::class, 'updateblog']);
    Route::get('/blogdelete/{id}', [BlogController::class, 'deleteblog']);
    //========================Blog End====================

    //====================Route for Job==================
    Route::get('email-test', function(){
  
        $details['email'] = 'your_email@gmail.com';
      
        dispatch(new App\Jobs\SendEmailJob($details));
      
        dd('done');
    });
});



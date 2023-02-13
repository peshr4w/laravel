<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\formController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\progressController;
use App\Mail\helloMail;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\HttpKernel\Profiler\Profile;
Route::resource('/students', mainController::class);
Route::get('/delete', function(){
    student::onlyTrashed()->where('id',2)->forceDelete();
});
Route::get('/showupload' ,progressController::class."@index");
Route::post('upload' ,progressController::class."@uploadToServer")->name('uploadToServer');

Route::resource('/blogs',blogController::class);
Route::get('/items', function () {
    return view('items');
});
Route::get('/table', function () {
    return view('table');
});

// Route::resource('/post', PostController::class);
// Route::get('/destroy/{id}', postController::class.'@destroy');
// Route::resource('/admin', student::class);
// Route::group(['prefix'=>'learning'],function () {
//     Route::middleware(['age'])->group(function () {
//         Route::name('learning.')->group(function () {
//             Route::get('/html', function () {
//                 $url = route('htm');
//                 echo "html file";
//                 return $url;
//             })->name('htm');
//             Route::get('/css', function () {
//                 $url = route('cascade');
//                 echo "css file";
//                 return $url;
//             })->name('cascade');
//             Route::get('/js', function () {
//                 $url = route('script');
//                 echo "js file";
//                 return $url;
//             })->name('script');
//         });
//     });
// });



// Route::match(['get', 'post'], '/', function () {
//     return view('welcome');
// });
// Route::get('/user/{name?}/{id?}', function ($name = "peshraw", $id = 1) {
//     return "username is optional $name and id is $id";
// })->whereAlpha('name')->whereNumber('id');

// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get("/person", function () {
//     return "person";
// });

// Route::get("/person/profile/{id}", function ($id) {
//     $url = route('pro', ['id' >= 100]);
//     return $url;
// })->name('pro')->middleware('age');

// Route::get('/redirect', function () {
//     return redirect()->route('learning.htm');
// });
// Route::get('/student', function () {
//     return view('student', ['name'=>'peshraw']);
// });

// Route::get('/student/details/example', function () {
//     $url = route('student.details');
//     return "the url is $url";
// })->name('student.details')->middleware('age');

<?php
use App\Guardian;

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

// Admin
Route::prefix('admin')->group(function() {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login.submit');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth:web_admin']], function(){
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::get('/stutable', 'AdminController@studentTable');
    Route::get('/showstutable', 'AdminController@showStudentTable');
    Route::put('/savestudent', 'AdminController@saveStudentTable');
    Route::get('/logout', 'AdminController@logout');
});
// Student
Route::prefix('student')->group(function() {
    Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'StudentAuth\LoginController@login')->name('student.login.submit');
});
Route::group(['prefix' => 'student', 'middleware' => ['auth:web_student']], function(){
    Route::get('/home', 'StudentController@index')->name('student.home');
    Route::post('/home', 'StudentController@updateLocation');
    Route::get('/home/studentinfo', 'StudentController@showInformation');
    Route::get('/home/showlocation', 'StudentController@showLocation');
    Route::get('/profile', 'StudentController@linkProfile');
    Route::get('/driver/message', 'StudentController@linkMessage');
    Route::post('/driver/message', 'MessageController@sendStudentMessages');
    Route::get('/driver/message/recieve', 'MessageController@fetchStudentMessages');
    Route::get('/driver', 'StudentController@linkDriver');
    Route::get('/driver/driverinfo', 'StudentController@showDriverInfo');
    Route::get('/logout', 'StudentController@logout');
});

// Driver
Route::prefix('driver')->group(function() {
    Route::get('/login', 'DriverAuth\LoginController@showLoginForm')->name('driver.login');
    Route::post('/login', 'DriverAuth\LoginController@login')->name('driver.login.submit');
});
Route::group(['prefix' => 'driver', 'middleware' => ['auth:web_driver']], function(){
    Route::get('/home', 'DriverController@index')->name('driver.home');
    Route::post('/home', 'DriverController@updateLocation');
    Route::get('/profile', 'DriverController@linkProfile');
    Route::get('/student/message', 'DriverController@linkMessage');
    Route::post('/student/message', 'MessageController@sendDriverMessages');
    Route::get('/student/message/recieve', 'MessageController@fetchDriverMessages');
    Route::get('/logout', 'DriverController@logout');
});

// Guardian
Route::prefix('guardian')->group(function() {
    Route::get('/login', 'GuardianAuth\LoginController@showLoginForm')->name('guardian.login');
    Route::post('/login', 'GuardianAuth\LoginController@login')->name('guardian.login.submit');
});
Route::group(['prefix' => 'guardian', 'middleware' => ['auth:web_guardian']], function(){
    Route::get('/home', 'GuardianController@index')->name('guardian.home');
    Route::get('/home/showlocation', 'GuardianController@showLocation');
    Route::get('/profile', 'GuardianController@linkProfile');
    Route::get('/profile/showinfo', 'GuardianController@showProfileInfo');
    Route::get('/logout', 'GuardianController@logout');
});

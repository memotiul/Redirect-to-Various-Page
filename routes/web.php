<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DoctorController;

 
Route::get('dashboard', 'AuthController@dashboard');
Route::get('profile', 'AuthController@profile')->name('user-profile');
Route::get('login', 'AuthController@index')->name('login');
Route::post('custom-login', 'AuthController@customLogin')->name('login.custom');
Route::get('registration', 'AuthController@registration')->name('register-user');
Route::post('custom-registration', 'AuthController@customRegistration')->name('register.custom');
Route::get('signout', 'AuthController@signOut')->name('signout');
Route::get('change-password', 'AuthController@edit')->name('change-password');
Route::post('change-password', 'AuthController@store')->name('change.password');
Route::get('addstaff', 'AuthController@addstaff')->name('add-staff');
Route::post('customadd', 'AuthController@customadd')->name('custom.add');
Route::get('profile_staff', 'AuthController@profile_staff')->name('staff-profile');
Route::get('qview/{id}', 'AuthController@qview');
Route::get('userDetails', 'AuthController@userDetails')->name('user-details');
Route::get('destroy/{id}', 'AuthController@destroy');
Route::get('todoedit/{id}', 'AuthController@todoedit')->name('edit-todo');
Route::put('update/{id}','AuthController@update')->name('update-todo');
Route::get('adddoctor', 'AuthController@adddoctor')->name('add-doctor');
Route::post('add_doctor', 'AuthController@add_doctor')->name('doctor.add');
Route::get('addbranch', 'AuthController@addbranch')->name('add-branch');
Route::post('add_branch', 'AuthController@add_branch')->name('branch.add');
Route::get('staffzone', 'AuthController@staff_zone')->name('staff-zone');
Route::get('loging', 'StaffController@index')->name('loging');
Route::post('custom-loging', 'StaffController@customLogin')->name('loging.custom');
Route::get('addpatient', 'AuthController@addpatient')->name('add-patient');
Route::post('add_patient', 'AuthController@add_patient')->name('patient.add');
Route::get('patient_list', 'AuthController@patient_list')->name('patient-details');
Route::get('dclogin', 'DoctorController@index')->name('dclogin');
Route::get('doctor_profile', 'AuthController@doctor_profile')->name('doctor-profile');
Route::post('custom-loging', 'DoctorController@customLogin')->name('loging.custom');
Route::get('makechart','AuthController@makeChart')->name('make-chart');


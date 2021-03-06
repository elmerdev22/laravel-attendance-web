<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ADMIN LOGIN
Route::group(['middleware' => ['guest']], function(){
    Route::get('admin/login', function () {
        return view('auth.login-admin');
    })->name('admin.login');
});


// Login Redirect
Route::group(['prefix' => 'login-redirect', 'as' => 'login-redirect.', 'namespace' => 'Auth'], function () {
    $c = 'LoginRedirectController';
    
    Route::get('/', [
        'as' 	=> 'index',
        'uses'  => $c.'@index'
    ]);
});

// IF AUTH
Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout/{redirect}', 'Auth\LogoutController@index')->name('auth.logout');
});

// ADMIN GROUP
Route::group(['middleware' => ['auth', 'auth.admin']], function(){
    Route::group(['prefix' => 'admin', 'as' => 'back-end.', 'namespace' => 'BackEnd'], function () {
        
        // Dashboard
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function (){
            $c = 'DashboardController';
            
            Route::get('/', [
                'as'    => 'index',
                'uses'  => $c.'@index'
            ]);
            
        });

        // Employees
        Route::group(['prefix' => 'employees', 'as' => 'employees.'], function (){
            $c = 'EmployeesController';
            
            Route::get('/', [
                'as'    => 'index',
                'uses'  => $c.'@index'
            ]);

            Route::get('/add', [
                'as'    => 'add',
                'uses'  => $c.'@add'
            ]);
            
            Route::get('/{employee_no}/{key_token}/edit', [
                'as'    => 'edit',
                'uses'  => $c.'@edit'
            ]);
            
            Route::get('/{employee_no}/{key_token}', [
                'as'    => 'profile',
                'uses'  => $c.'@profile'
            ]);
            
            Route::get('/export/attendance/{employee_id}', [
                'as'    => 'export-attendance',
                'uses'  => $c.'@exportAttendance'
            ]);
            
        });

    });
});

Auth::routes();

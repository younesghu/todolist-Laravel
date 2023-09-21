<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
    $tasks = [];
    if(auth()->check()){
        $tasks = auth()->user()->usersTasks()->latest()->get();
    }
    return view('view', ['tasks' => $tasks]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/authentificate', [UserController::class, 'authentificate']);
Route::get('/login', [UserController::class, 'login']);

// Tasks related routes
Route::post('/create-task', [TaskController::class, 'createTask']);
Route::post('/create-task', [TaskController::class, 'createTask']);
Route::delete('/delete-task/{task}', [TaskController::class, 'deleteTask']);

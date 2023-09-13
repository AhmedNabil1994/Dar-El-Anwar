<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('students',[StudentController::class,'index'])->name('api.students');
Route::get('students_by_name/{id}',[StudentController::class,'indexByName'])->name('api.students.name');
Route::get('students_by_code/{id}',[StudentController::class,'indexByCode'])->name('api.students.code');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

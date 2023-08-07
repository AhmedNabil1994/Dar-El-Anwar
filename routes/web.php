<?php

use App\Http\Controllers\Api\PaymentApiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallerController;
use App\Http\Controllers\VersionUpdateController;
use \App\Http\Controllers\Admin\AdminController;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('sign-up', [RegistrationController::class, 'signUp'])->name('sign-up');
    Route::post('store-sign-up', [RegistrationController::class, 'storeSignUp'])->name('store.sign-up')->middleware('isDemo');
});
Route::get('forget-password', [LoginController::class, 'forgetPassword'])->name('forget-password');
Route::post('forget-password', [LoginController::class, 'forgetPasswordEmail'])->name('forget-password.email')->middleware('isDemo');
Route::get('reset-password', [LoginController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password', [LoginController::class, 'resetPasswordCheck'])->name('reset-password.check')->middleware('isDemo');



Route::get('/students/filter', function (Request $request) {
    $department = $request->get('department');
    $level = $request->get('level');
    $status = $request->get('status');

    // Retrieve the filtered data from the database
    $students = \App\Models\Student::when($department, function ($query, $department) {
        return $query->where('department', $department);
    })
        ->when($level, function ($query, $level) {
            return $query->where('level', $level);
        })
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->get();

    // Return the filtered data as JSON
    return response()->json([
        'students' => $students
    ]);
});


Route::get('/cities/{government}', [ \App\Http\Controllers\AddressController::class, 'getCitiesByGovernment']);
//Route::get('/governments/{country}', [ \App\Http\Controllers\AddressController::class, 'getGovernments']);

Route::post('/sign-up', [\App\Http\Controllers\Admin\Auth\RegistrationController::class, 'storeSignUp'])->name('admins.store.sign-up');

Auth::routes(['register' => false]);
Route::get('notification-url/{uuid}', [InstallerController::class, 'notificationUrl'])->name('notification.url');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



//    Route::get('/local/{ln}', function ($ln) {
//        $language = Language::where('iso_code', $ln)->first();
//        if (!$language){
//            $language = Language::find(1);
//            if ($language){
//                $ln = $language->iso_code;
//                session(['local' => $ln]);
//                App::setLocale(session()->get('local'));
//            }
//        }
//
//        session(['local' => $ln]);
//        App::setLocale(session()->get('local'));
//        return redirect()->back();
//    });



Route::get('version-update', [VersionUpdateController::class, 'versionUpdate'])->name('version-update');
Route::post('process-update', [VersionUpdateController::class, 'processUpdate'])->name('process-update');


Route::match(array('GET','POST'),'/payment-notify/{id}', [PaymentApiController::class, 'paymentNotifier'])->name('paymentNotify');

Route::get('payment-cancel/{id}', [PaymentApiController::class, 'paymentCancel'])->name('paymentCancel');

Route::get('/', [MainIndexController::class, 'index'])->name('main.index');

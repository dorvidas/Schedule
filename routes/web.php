<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\JsonResponse;

Route::get('/', function()
{
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store']);

Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::post('/messages', [MessageController::class, 'sendMessages'])->name('messages');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/index', function () {
        $numberToConnect = new \Vonage\Voice\Endpoint\Phone('37067526613');
    
        $action = new \Vonage\Voice\NCCO\Action\Connect($numberToConnect);
        $action->setFrom('37052220525');
    
        $ncco = new \Vonage\Voice\NCCO\NCCO();
        $ncco->addAction($action);
    
        return new JsonResponse($ncco->toArray());
});

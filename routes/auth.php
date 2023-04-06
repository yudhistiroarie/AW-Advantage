<?php

use App\Actions\Email\DoEmailVerifNotif;
use App\Actions\Email\EmailVerif;
use App\Actions\Email\EmailVerifPrompt;
use App\Actions\Login\DoLogout;
use App\Actions\Login\ShowLogin;
use App\Actions\Login\DoLogin;
use App\Actions\Password\DoConfirmPass;
use App\Actions\Password\DoForgetPass;
use App\Actions\Password\DoNewPass;
use App\Actions\Password\ShowConfirmPass;
use App\Actions\Password\ShowForgetPass;
use App\Actions\Password\ShowNewPass;
use App\Actions\Register\DoRegis;
use App\Actions\Register\ShowRegis;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\ConfirmablePasswordController;
// use App\Http\Controllers\Auth\EmailVerificationNotificationController;
// use App\Http\Controllers\Auth\EmailVerificationPromptController;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // ===
    Route::get('register', ShowRegis::class)
                ->name('register');

    // ===
    Route::post('register', DoRegis::class);

    // ===
    Route::get('login', ShowLogin::class)
                ->name('login');

    // ===
    Route::post('login', DoLogin::class);

    // ===
    Route::get('forgot-password', ShowForgetPass::class)
                ->name('password.request');

    // ===
    Route::post('forgot-password', DoForgetPass::class)
                ->name('password.email');

    // ===
    Route::get('reset-password/{token}', ShowNewPass::class)
                ->name('password.reset');

    // ===
    Route::post('reset-password', DoNewPass::class)
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    // ===
    Route::get('verify-email', EmailVerifPrompt::class)
                ->name('verification.notice');

    // ===
    Route::get('verify-email/{id}/{hash}', EmailVerif::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', DoEmailVerifNotif::class)
                ->middleware('throttle:6,1')
                ->name('verification.send');

    // ===
    Route::get('confirm-password', ShowConfirmPass::class)
                ->name('password.confirm');

    // ===
    Route::post('confirm-password', DoConfirmPass::class);

    // ===
    Route::post('logout', DoLogout::class)
                ->name('logout');
});

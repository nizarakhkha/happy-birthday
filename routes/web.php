<?php
use App\Http\Controllers\BirthdayController;

Route::get('/birthday', [BirthdayController::class, 'index'])->name('birthday.index');
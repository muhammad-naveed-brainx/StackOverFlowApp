<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RegisterUserController;

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


Route::get('/', [QuestionController::class, 'index'])->name('question.index');
Route::get('/ask-question', [QuestionController::class, 'create'])->name('question.create');
Route::get('/questions/{id}',[QuestionController::class, 'show'])->name('question.show');
Route::post('/ask-question', [QuestionController::class, 'store'])->name('question.store');
Route::post('/answers/{id}', [AnswerController::class, 'store'])->name('answer.store');
Route::get('/register', [RegisterUserController::class, 'create'])->name('registerUser.create');

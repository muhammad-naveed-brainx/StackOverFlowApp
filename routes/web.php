<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;

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


Route::get('/questions-list', [QuestionController::class, 'index'])->name('question.index');
Route::get('/question-details/{id}',[QuestionController::class, 'show'])->name('question.show');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('/register', [UserController::class, 'store'])->name('user.store');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/login', [UserController::class, 'createLogin'])->name('user.createLogin');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::middleware('auth')->group(function () {
    Route::get('/ask-question', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/answers/{id}', [AnswerController::class, 'store'])->name('answer.store');
    Route::get('/vote-question/{id}/{vote}',[QuestionController::class, 'vote'])->name('question.vote');
    Route::get('/vote-answer/{id}/{vote}',[AnswerController::class, 'vote'])->name('answer.vote');
    Route::get('/questions/edit/{id}',[QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/questions/update/{id}',[QuestionController::class, 'update'])->name('question.update');
    Route::get('/answers/edit/{id}',[AnswerController::class, 'edit'])->name('answer.edit');
    Route::post('/answers/update/{id}',[AnswerController::class, 'update'])->name('answer.update');
    Route::get('/questions/delete/{id}',[QuestionController::class, 'destroy'])->name('question.destroy');
    Route::get('/answers/delete/{id}',[AnswerController::class, 'destroy'])->name('answer.destroy');
    Route::post('/store-question', [QuestionController::class, 'store'])->name('question.store');
});

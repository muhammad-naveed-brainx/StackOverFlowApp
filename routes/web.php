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


Route::get('/', [QuestionController::class, 'index'])->name('question.index');
Route::get('/ask-question', [QuestionController::class, 'create'])->name('question.create')
    ->middleware('auth');
Route::get('/questions/{id}',[QuestionController::class, 'show'])->name('question.show');
Route::post('/ask-question', [QuestionController::class, 'store'])->name('question.store');
Route::post('/answers/{id}', [AnswerController::class, 'store'])->name('answer.store')
    ->middleware('auth');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('/register', [UserController::class, 'store'])->name('user.store');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/login', [UserController::class, 'createLogin'])->name('user.createLogin');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/vote-question/{id}/{vote}',[QuestionController::class, 'vote'])->name('question.vote')
    ->middleware('auth');
Route::get('/vote-answer/{id}/{vote}',[AnswerController::class, 'vote'])->name('answer.vote')
    ->middleware('auth');

Route::get('/questions/edit/{id}',[QuestionController::class, 'edit'])->name('question.edit')
    ->middleware('auth');
Route::post('/questions/update/{id}',[QuestionController::class, 'update'])->name('question.update')
    ->middleware('auth');
Route::get('/answers/edit/{id}',[AnswerController::class, 'edit'])->name('answer.edit')
    ->middleware('auth');
Route::post('/answers/update/{id}',[AnswerController::class, 'update'])->name('answer.update')
    ->middleware('auth');

Route::get('/questions/delete/{id}',[QuestionController::class, 'destroy'])->name('question.destroy')
    ->middleware('auth');
Route::get('/answers/delete/{id}',[AnswerController::class, 'destroy'])->name('answer.destroy')
    ->middleware('auth');

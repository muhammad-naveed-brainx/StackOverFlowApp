<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\HomeController;
use App\Models\Question;

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


Route::get('/', [HomeController::class, 'index']);
Route::get('/ask-question', [QuestionController::class, 'create']);
Route::get('/questions/{id}',[QuestionController::class, 'show']);
Route::post('/ask-question', [QuestionController::class, 'store']);
Route::post('/answers/{id}', [AnswerController::class, 'store']);

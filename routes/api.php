<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/questions-list', [QuestionController::class, 'index'])->name('question.index');
Route::get('/question-details/{id}',[QuestionController::class, 'show'])->name('question.show');
Route::post('/store-question', [QuestionController::class, 'store'])->name('question.store');
Route::delete('/questions/delete/{id}',[QuestionController::class, 'destroy'])->name('question.destroy');
Route::delete('/answers/delete/{id}',[AnswerController::class, 'destroy'])->name('answer.destroy');
Route::patch('/questions/update/{id}',[QuestionController::class, 'update'])->name('question.update');
Route::post('/answers/update/{id}',[AnswerController::class, 'update'])->name('answer.update');


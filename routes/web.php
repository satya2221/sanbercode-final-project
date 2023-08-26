<?php

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

Route::get('/', [App\Http\Controllers\QuestionController::class, 'index']);

Auth::routes();

// Route resource for Category
Route::resource('categories', App\Http\Controllers\CategoryController::class);

// Route resource for Question
Route::resource('questions', App\Http\Controllers\QuestionController::class);

Route::get('/user_question', [App\Http\Controllers\QuestionController::class, 'user_question']);

Route::post('/', [App\Http\Controllers\QuestionController::class, 'search']);

Route::post('/user_question', [App\Http\Controllers\QuestionController::class, 'search_user_question']);

// Route resource for Answer
Route::resource('answers', App\Http\Controllers\AnswerController::class);
Route::get('/answers/create/{id_question}', [App\Http\Controllers\AnswerController::class, 'create'])->name('answer.id.create');
Route::get('/user_answer', [App\Http\Controllers\AnswerController::class, 'user_answer'])->name('answered.by.user');

// Route for User Profile
Route::resource('users', App\Http\Controllers\UserController::class);

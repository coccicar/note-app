<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'showAllNotes'])->name('showAllNotes');
Route::get('/notes/{id}', [NoteController::class, 'viewNote'])->name('viewNote');
Route::get('/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/note/create', [NoteController::class, 'storeNote'])->name('storeNote');
Route::get('/note/edit/{id}', [NoteController::class, 'editNote'])->name('editNote');
Route::post('note/update/{id}', [NoteController::class, 'updateNote'])->name('updateNote');
Route::post('note/delete/{id}', [NoteController::class, 'deleteNote'])->name('deleteNote');
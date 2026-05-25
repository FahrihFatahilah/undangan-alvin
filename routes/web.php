<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InvitationController::class, 'index'])->name('invitation');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');

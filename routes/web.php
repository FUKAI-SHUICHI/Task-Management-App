<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::post('/tasks/reorder', [TaskController::class, 'reorder']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
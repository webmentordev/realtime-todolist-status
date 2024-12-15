<?php

use App\Models\Todo;
use App\Livewire\Home;
use App\Events\TodoListener;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/todo/{todo}', function (Todo $todo) {
    $todo->status = $todo->status === 'pending' ? 'completed' : 'pending';
    $todo->save();
    broadcast(new TodoListener($todo));
    return "Event Broadcasted";
});
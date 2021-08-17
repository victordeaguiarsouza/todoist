<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowLists;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/lists/mylists', ShowLists::class);

Route::get('/lists', function () {
    
    return (new ShowLists())->render();
    //return view('livewire.show-lists');
})->middleware(['auth'])->name('lists');

require __DIR__.'/auth.php';

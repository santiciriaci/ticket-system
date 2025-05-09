<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketDocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rutas  para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    
    // rutas exclusivas para usuarios con rol 'user'
    Route::middleware(['auth', 'check.role:user'])->group(function () {
        Route::resource('tickets', TicketController::class);
        Route::post('/tickets/{ticket}/documents', [TicketDocumentController::class, 'store'])
            ->name('ticket_documents.store');
            
    });

    // Rutas exclusivas para agentes
    Route::middleware(['auth', 'check.role:agent'])->prefix('agent')->name('agent.')->group(function () {
       
        Route::get('/tickets', [AgentController::class, 'index'])->name('tickets.index');
        Route::put('/tickets/{ticket}', [AgentController::class, 'update'])->name('tickets.update');

    });
    

});

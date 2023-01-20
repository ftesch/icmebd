<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/igrejas', [\App\Http\Controllers\IgrejaController::class,'index'])->name('igreja.index');
        Route::get('/igrejas/create', [\App\Http\Controllers\IgrejaController::class,'create'])->name('igreja.create');
        Route::post('/igrejas/store', [\App\Http\Controllers\IgrejaController::class,'store'])->name('igreja.store');
        Route::get('/igrejas/{igreja}/edit', [\App\Http\Controllers\IgrejaController::class,'edit'])->name('igreja.edit');
        Route::put('/igrejas/{igreja}/update', [\App\Http\Controllers\IgrejaController::class,'update'])->name('igreja.update');

        Route::post('/igreja/{igreja}/membro/store', [\App\Http\Controllers\MembroController::class,'store'])->name('membro.store');
        Route::delete('/profiles/{profile}/destroy', [\App\Http\Controllers\MembroController::class,'destroy'])->name('membro.destroy');

    });

    Route::middleware('auth')->group(function () {
        Route::get('/ebd', [\App\Http\Controllers\EBDController::class,'index'])->name('ebd.index');
        Route::get('/ebd/create', [\App\Http\Controllers\EBDController::class,'create'])->name('ebd.create');
        Route::post('/ebd/store', [\App\Http\Controllers\EBDController::class,'store'])->name('ebd.store');
        Route::get('/ebd/{ebd}/edit', [\App\Http\Controllers\EBDController::class,'edit'])->name('ebd.edit');
        Route::put('/ebd/{ebd}/update', [\App\Http\Controllers\EBDController::class,'update'])->name('ebd.update');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/ebd/{ebd}/pergunta/create', [\App\Http\Controllers\PerguntasController::class,'create'])->name('pergunta.create');
        Route::post('/ebd/{ebd}/pergunta/store', [\App\Http\Controllers\PerguntasController::class,'store'])->name('pergunta.store');
        Route::get('/ebd/{ebd}/pergunta/{pergunta}/edit', [\App\Http\Controllers\PerguntasController::class,'edit'])->name('pergunta.edit');
        Route::put('/ebd/{ebd}/pergunta/{pergunta}/store', [\App\Http\Controllers\PerguntasController::class,'update'])->name('pergunta.update');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/respostas', [\App\Http\Controllers\RespostasController::class,'index'])->name('resposta.index');
        Route::get('/ebd/{ebd}/resposta/{pergunta}/create', [\App\Http\Controllers\RespostasController::class,'create'])->name('resposta.create');
        Route::post('/ebd/{ebd}/resposta/{pergunta}/store', [\App\Http\Controllers\RespostasController::class,'store'])->name('resposta.store');

    });

    require __DIR__.'/auth.php';
});

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VegetalController;
use App\Models\Vegetal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// --- ROTAS PÚBLICAS (Qualquer um acessa) ---
Route::get('/', function (Request $request) {
    $query = Vegetal::query();

    // Filtro por categoria (vegetal, fruta, legume)
    if ($request->filled('categoria')) {
        $query->where('categoria', $request->categoria);
    }

    // Filtro por busca (campo "Buscar planta...")
    if ($request->filled('busca')) {
        $busca = $request->busca;
        $query->where('nome', 'like', "%{$busca}%");
    }

    // Paginação (12 por página)
    $plantas = $query->paginate(12);

    return view('pages.home', ['plantas' => $plantas]);
})->name('home');

Route::get('/vegetais/{vegetal}', [VegetalController::class, 'show'])->name('vegetais.show');
Route::get('/lista-vegetais', [VegetalController::class, 'index'])->name('vegetais.index'); // Listagem pública

// --- ROTAS PRIVADAS (Só logado acessa) ---
Route::middleware('auth')->group(function () {
    // CRUD (Criar, Editar, Deletar)
    Route::get('/novo/vegetal', [VegetalController::class, 'create'])->name('vegetais.create');
    Route::post('/vegetais', [VegetalController::class, 'store'])->name('vegetais.store');
    Route::get('/vegetais/{vegetal}/editar', [VegetalController::class, 'edit'])->name('vegetais.edit');
    Route::put('/vegetais/{vegetal}', [VegetalController::class, 'update'])->name('vegetais.update');
    Route::delete('/vegetais/{vegetal}', [VegetalController::class, 'destroy'])->name('vegetais.destroy');

    // Favoritar
    Route::post('/vegetais/{vegetal}/favoritar', [VegetalController::class, 'toggleFavorite'])->name('vegetais.favorite');

    // Perfil (Vem com o Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

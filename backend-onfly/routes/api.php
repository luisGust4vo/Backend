<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesaController;

// Rota para autenticar o usuário e gerar um token
Route::post('/login', [AuthController::class, 'login']);

// Grupo de rotas para API protegido por Sanctum
Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    // Rotas para o recurso 'despesas' controlado pelo DespesaController
    Route::resource('despesas', DespesaController::class);

    // Rota PUT para atualizar despesas com autorização
    Route::put('/despesas/{despesa}/{id}', [DespesaController::class, 'update'])->middleware('can:update,despesa');

    // Rota DELETE para excluir despesas com autorização
    Route::delete('/despesas/{id}', [DespesaController::class, 'destroy'])->middleware('can:delete,despesa');
});

// Rota para obter informações do usuário autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rota de fallback para tratar URLs não encontradas
Route::fallback(function () {
    return response()->json(['error' => 'Rota não encontrada.'], 404);
});

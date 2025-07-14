<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TerceroController;

Route::get('/ping', function () {
    return response()->json(['status' => 'API funcionando correctamente']);
});

Route::middleware('api')->prefix('terceros')->group(function () {
    Route::get('/', [TerceroController::class, 'index']);
    Route::post('/', [TerceroController::class, 'store']);
    Route::put('/{id}', [TerceroController::class, 'update']);
    Route::delete('/{id}', [TerceroController::class, 'destroy']);
});

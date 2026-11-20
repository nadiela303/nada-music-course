<?php

use App\Http\Controllers\Api\PendaftaranApiController;
use App\Http\Controllers\Api\ProgramApiController;
use App\Http\Controllers\Api\SiswaApiController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'project' => 'Nada Music Course by Diela',
        'message' => 'API Level 7 aktif dan siap digunakan ♪',
    ]);
});

Route::get('/info', function () {
    return response()->json([
        'status' => true,
        'app' => 'Nada Music Course by Diela',
        'level' => 'Level 7 - REST API',
        'endpoints' => [
            '/api/test',
            '/api/info',
            '/api/programs',
            '/api/siswas',
            '/api/pendaftarans',
        ],
    ]);
});

Route::apiResource('programs', ProgramApiController::class)->names('api.programs');
Route::apiResource('siswas', SiswaApiController::class)->names('api.siswas');
Route::apiResource('pendaftarans', PendaftaranApiController::class)->names('api.pendaftarans');

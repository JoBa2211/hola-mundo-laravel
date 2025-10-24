<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return view('hola');
});

/*
 | Temporary DB test route
 | - Use this to verify Postgres connectivity from the app/container.
 | - Returns JSON with a simple DB version and migrations count (if table exists).
 | - Remove this route after testing for security.
 */
Route::get('/db-test', function () {
    try {
        // Get Postgres version
        $versionRow = DB::select('select version() as v');
        $version = $versionRow[0]->v ?? null;

        // Try to count migrations table if it exists
        try {
            $migrationsRow = DB::select("select count(*) as c from migrations");
            $migrationsCount = $migrationsRow[0]->c ?? null;
        } catch (\Exception $e) {
            // migrations table might not exist yet
            $migrationsCount = null;
        }

        return response()->json([
            'ok' => true,
            'env' => App::environment(),
            'db_version' => $version,
            'migrations_count' => $migrationsCount,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'ok' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
});

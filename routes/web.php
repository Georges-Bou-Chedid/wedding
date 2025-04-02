<?php

use App\Services\GoogleSheetsService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/charbel-and-rita');
});

Route::get('/charbel-and-rita', function () {
    return view('welcome');
});

Route::post('/charbel-and-rita/submit', function (\Illuminate\Http\Request $request, GoogleSheetsService $googleSheetsService) {
    $name = $request->input('name');

    if ($name === null || $name === '') {
        throw new Exception('Name is required');
    }

    try {
        $googleSheetsService->appendNameToSheet($name);
        return response()->json(['message' => 'Name submitted successfully!']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to submit name'], 500);
    }
})->name('submit');

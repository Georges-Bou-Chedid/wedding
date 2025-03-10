<?php

use App\Services\GoogleSheetsService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit', function (\Illuminate\Http\Request $request, GoogleSheetsService $googleSheetsService) {
    $name = $request->input('name');
    $attending = $request->input('attending');

    try {
        $googleSheetsService->appendNameToSheet($name, $attending);
        return response()->json(['message' => 'Name submitted successfully!']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to submit name'], 500);
    }
})->name('submit');

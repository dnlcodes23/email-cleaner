<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\EmailCleanerService;

/**
 * 1. Main Landing Page
 * Displays the initial screen where users paste their email list.
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * 2. Process and Clean the Email List
 * Uses dependency injection to call our professional EmailCleanerService.
 */
Route::post('/clean-list', function (Request $request, EmailCleanerService $cleaner) {
    // Basic request validation
    $request->validate([
        'email_list' => 'required|string',
    ]);

    // Execute the business logic from our service layer
    $result = $cleaner->clean($request->input('email_list'));

    // Save the structured results inside the user's session memory
    session([
        'cleaned_result' => $result['text'],
        'original_count' => $result['original_count'],
        'cleaned_count'  => $result['cleaned_count']
    ]);

    return redirect('/result');
});

/**
 * 3. Secure Display of the Cleaned Result
 * Protected route that renders the output only if data exists in session.
 */
Route::get('/result', function () {
    if (!session()->has('cleaned_result')) {
        return redirect('/');
    }
    return view('result');
});

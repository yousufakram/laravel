<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ArticleController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register_user', [RegistrationController::class, 'register']);
Route::post('/login_user', [AuthController::class, 'login']);
Route::post('/logout_user', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/ebooks', [EbookController::class, 'store']);
    Route::put('/ebooks/{id}', [EbookController::class, 'update']); // Update ebook
    Route::delete('/ebooks/{id}', [EbookController::class, 'destroy']); // Delete ebook
    Route::get('/ebooks', [EbookController::class, 'index']);
    Route::get('/ebooks/recent', [EbookController::class, 'recent']);
    Route::get('/ebooks/popular', [EbookController::class, 'popular']);
    Route::get('/ebooks/{slug}', [EbookController::class, 'show']);
    Route::post('/ebooks/{id}/rate', [EbookController::class, 'rate']);
    Route::get('/ebooks/trending', [EbookController::class, 'trending']);

});



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/courses', [CourseController::class, 'store']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/recent', [CourseController::class, 'recent']);
    Route::get('/courses/popular', [CourseController::class, 'popular']);
    Route::get('/courses/{slug}', [CourseController::class, 'show']);
    Route::post('/courses/{id}/rate', [CourseController::class, 'rate']);
    Route::get('/courses/trending', [CourseController::class, 'trending']);

});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/meals', [MealController::class, 'store']);
    Route::put('/meals/{id}', [MealController::class, 'update']);
    Route::delete('/meals/{id}', [MealController::class, 'destroy']);
    Route::get('/meals', [MealController::class, 'index']);
    Route::get('/meals/recent', [MealController::class, 'recent']);
    Route::get('/meals/popular', [MealController::class, 'popular']);
    Route::get('/meals/{slug}', [MealController::class, 'show']);
    Route::post('/meals/{id}/rate', [MealController::class, 'rate']);
    Route::get('/meals/trending', [MealController::class, 'trending']);
});



Route::middleware('auth:sanctum')->group(function () {
    // CRUD Endpoints
    Route::get('/workouts', [WorkoutController::class, 'index']);
    Route::post('/workouts', [WorkoutController::class, 'store']);
    Route::get('/workouts/{slug}', [WorkoutController::class, 'show']);
    Route::put('/workouts/{id}', [WorkoutController::class, 'update']);
    Route::delete('/workouts/{id}', [WorkoutController::class, 'destroy']);

    // Additional Features
    Route::get('/workouts/recent', [WorkoutController::class, 'recent']);
    Route::get('/workouts/trending', [WorkoutController::class, 'trending']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/{slug}', [ArticleController::class, 'show']);
    Route::put('/articles/{id}', [ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
    Route::get('/articles/trending', [ArticleController::class, 'trending']);
    Route::get('/articles/best', [ArticleController::class, 'best']);
    Route::get('/articles/recent', [ArticleController::class, 'recent']);
});
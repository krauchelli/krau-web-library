<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

// pre-defined routes

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


// Book Routes
Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::get('/books/export/excel', [BookController::class, 'exportExcel'])->name('books.export.excel');
    Route::get('/books/export/pdf', [BookController::class, 'exportPDF'])->name('books.export.pdf');
    Route::get('/img/{filename}', [BookController::class, 'getImage'])->name('books.image');
    Route::get('/pdf/{filename}', [BookController::class, 'getPdf'])->name('books.pdf');
    Route::get('/books/{id}/upload', [BookController::class, 'uploadForm'])->name('books.uploadForm');

    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::post('/books/upload', [BookController::class, 'upload'])->name('books.upload');
    
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Category Routes
Route::middleware('auth')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
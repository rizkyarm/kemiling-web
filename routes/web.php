<?php

 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ProductUmkmController;
use App\Http\Controllers\ProductWisataController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Product\ProductController as ProductActionsController; 
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as NewsAdminController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product-umkm', [ProductUmkmController::class, 'product-Umkm']);
Route::get('/product-wisata', [ProductWisataController::class, 'product-Wisata']);
Route::get('/tentang', [TentangController::class, 'index']);
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');



Route::get('/product/{product:slug}', [ProductActionsController::class, 'show'])->name('product.show');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/email/verify', [\App\Http\Controllers\Auth\EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\Auth\VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [\App\Http\Controllers\Auth\EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
        
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::get('/products/add-product', [ProductActionsController::class, 'create'])->name('add-product');
    Route::post('/products/add-product', [ProductActionsController::class, 'store'])->name('store-product');
    Route::get('/products/my-products', [ProductActionsController::class, 'myProducts'])->name('my-products');
    Route::get('/product/{product}/edit', [ProductActionsController::class, 'edit'])->name('product.edit');
    Route::patch('/product/{product}', [ProductActionsController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductActionsController::class, 'destroy'])->name('product.destroy');

    
    
});

Route::middleware(['auth', 'verified', 'admin.whitelist'])
    ->prefix('admin/news')->name('admin.news.')
    ->group(function () {
        Route::get('/',            [NewsController::class, 'index'])->name('index');
        Route::get('/create',      [NewsController::class, 'create'])->name('create');
        Route::post('/',           [NewsController::class, 'store'])->name('store');
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit');
        Route::put('/{news}',      [NewsController::class, 'update'])->name('update');
        Route::delete('/{news}',   [NewsController::class, 'destroy'])->name('destroy');
    });


Route::post('/profile/send-password-link', function (Request $request) {
    $user = $request->user();

    $status = Password::sendResetLink(['email' => $user->email]);

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->middleware(['auth'])->name('profile.send-password-link');

require __DIR__.'/auth.php';

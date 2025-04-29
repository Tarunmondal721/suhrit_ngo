<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\DonationController;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [HomeController::class,'index'])->name('home');


Route::prefix('suhrit')->group(function(){
    // Route::get('/home', [HomeController::class,'index'])->name('home');

    Route::get('/about_us', [AboutController::class,'index'])->name('about');
    Route::get('/services', [ServiceController::class,'Userindex'])->name('service');
    Route::get('/gallery', [GalleryController::class,'index'])->name('gallery');
    Route::get('/blogs', [BlogController::class,'index'])->name('blog');
    Route::get('/events', [EventController::class, 'index'])->name('events');


    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
    Route::get('/verify-email/{token}', [EventController::class, 'verifyEmail'])->name('verify.email');

    Route::post('/send-otp', [OTPController::class, 'sendOTP'])->name('send.otp');
    Route::post('/verify-otp', [OTPController::class, 'verifyOTP'])->name('verify.otp');

    Route::post('/donate', [DonationController::class, 'store'])->name('donation.store');
    Route::post('/update-payment', [DonationController::class, 'verify'])->name('donation.verify');

});

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::resource('/services', ServiceController::class);
    Route::get('/dashboard',[FrontendController::class, 'index'])->name('dashboard');

    Route::get('/blogs', [BlogController::class,'AdminIndex'])->name('admin.blog');
    Route::post('/add-blogs', [BlogController::class,'store'])->name('admin.blog.store');
    Route::put('/add-blogs/update', [BlogController::class,'update'])->name('admin.blog.update');
    Route::delete('/delete-blogs/{blogs}', [BlogController::class,'destroy'])->name('admin.blog.delete');

    Route::get('/gallery', [GalleryController::class,'AdminIndex'])->name('admin.gallery');
    Route::post('/add-photos', [GalleryController::class,'store'])->name('admin.photo.store');
    Route::put('/add-photos/update', [GalleryController::class,'update'])->name('admin.photo.update');
    Route::delete('/delete-photos/{photos}', [GalleryController::class,'destroy'])->name('admin.photo.delete');

    Route::get('/events', [EventController::class, 'AdminIndex'])->name('events.index');
    Route::get('events/fetch', [EventController::class, 'fetchEvents'])->name('admin.event.fetch');
    Route::post('/events', [EventController::class, 'store'])->name('admin.event.store');
    Route::put('/events/update', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.event.destroy');
    Route::delete('/events/{event}', 'EventController@destroy')->name('admin.event.destroy');




});

require __DIR__.'/auth.php';

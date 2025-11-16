<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SystemInfoController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\User\AgendaController as UserAgendaController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Guest / User Routes
|--------------------------------------------------------------------------
*/

// Halaman utama guest → langsung ke Dashboard User
Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');

// Halaman galeri untuk user (lihat semua galeri)
Route::get('/galeri', [DashboardController::class, 'gallery'])->name('user.gallery');

// Guest halaman galeri (list galeri untuk umum)
Route::get('/guest', [GalleryController::class, 'index'])->name('guest.index');

// Guest halaman view statis (opsional, kalau memang ada file view `resources/views/user/guest.blade.php`)
Route::get('/guest-view', function () {
    return view('user.guest');
})->name('user.guest');

// Override default login Laravel → arahkan ke halaman guest
Route::get('/login', function () {
    return redirect()->route('guest.index');
})->name('login');

// Halaman Tentang Kami untuk user (commented out - controller doesn't exist)
// Route::get('/tentang-kami', [UserTentangKamiController::class, 'index'])
//     ->name('user.tentangkami');

// User Contact Routes
Route::get('/contact', [UserContactController::class, 'index'])->name('user.contact');
Route::post('/contact', [UserContactController::class, 'store'])->name('user.contact.store');

// User Tentang Kami Route
Route::get('/tentang-kami', [DashboardController::class, 'tentangKami'])->name('user.tentangkami');

// User Agenda Routes
Route::get('/agenda', [UserAgendaController::class, 'index'])->name('user.agendas.index');
Route::get('/agenda/{agenda}', [UserAgendaController::class, 'show'])->name('user.agendas.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/footer', [FooterController::class, 'update'])->name('footer.update');
});


/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

// Admin login
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Admin protected routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // Dashboard admin
    Route::get('dashboard', [GalleryController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD galeri
    Route::resource('galleries', GalleryController::class);

    // CRUD kategori
    Route::resource('categories', CategoryController::class);

    // CRUD tentang kami
    Route::resource('tentang-kami', \App\Http\Controllers\Admin\TentangKamiController::class);

    // News routes
    Route::resource('news', NewsController::class);

    // About routes
    Route::resource('about', AboutController::class);

    // System Info routes
    Route::get('system-info/edit', [SystemInfoController::class, 'edit'])->name('system-info.edit');
    Route::put('system-info', [SystemInfoController::class, 'update'])->name('system-info.update');

    // Contact routes
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('contacts/{id}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::patch('contacts/{id}/mark-unread', [AdminContactController::class, 'markAsUnread'])->name('contacts.mark-unread');
    Route::post('contacts/{id}/reply', [AdminContactController::class, 'sendReply'])->name('contacts.reply');

    // Agenda routes
    Route::resource('agendas', AdminAgendaController::class);
    Route::patch('agendas/{agenda}/toggle-publish', [AdminAgendaController::class, 'togglePublish'])->name('agendas.toggle-publish');

    // Profile routes
    Route::get('profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('profile/change-password', [ProfileController::class, 'changePassword'])->name('admin.profile.change-password');
    Route::put('profile/change-password', [ProfileController::class, 'updatePassword'])->name('admin.profile.update-password');
    Route::delete('profile/photo', [ProfileController::class, 'deletePhoto'])->name('admin.profile.delete-photo');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
});

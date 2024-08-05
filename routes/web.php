<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebInfoController;
use App\Http\Livewire\Category\ListCategory;
use App\Http\Livewire\News\CreateNews;
use App\Http\Livewire\News\ListNews;
use App\Http\Livewire\Pages\Account;
use App\Http\Livewire\Pages\CatePage;
use App\Http\Livewire\Pages\ContactPage;
use App\Http\Livewire\Pages\Detail;
use App\Http\Livewire\Pages\HomePage;
use App\Http\Livewire\User\ListUser;

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


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth', 'auth.admin')->name('admin.dashboard');

Route::middleware('auth', 'auth.admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/category', CategoryController::class);
    Route::get('/admin/danhmuc', ListCategory::class);
    Route::get("/admin/tin-tuc/create", [NewsController::class, 'index']);
    Route::post("/admin/tin-tuc/store", [NewsController::class, 'store'])->name('tintuc.store');
    Route::get("/admin/tin-tuc", ListNews::class);
    Route::get('/admin/tin-tuc/{id}', [NewsController::class, 'edit'])->name('tintuc.edit');
    Route::post('/admin/tin-tuc/{id}', [NewsController::class, 'update'])->name('tintuc.update');

    Route::middleware('auth', 'auth.admin_full')->group(function () {
        Route::get("/admin/user", ListUser::class);

        Route::get("/admin/user/create" , [UserController::class, 'create']);
        Route::post("/admin/user/store", [UserController::class, 'store'])->name('user.store');
        Route::get("/admin/webinfo", [WebInfoController::class, 'index']);
        Route::post("/admin/webinfo", [WebInfoController::class, 'store'])->name('webinfo.store');
    });
});

// user route
Route::get('/', HomePage::class);
Route::get('/danh-muc/{slug}', CatePage::class);
Route::get('/tin/{slug}', [DetailController::class, 'index']);
Route::get('/account', Account::class)->middleware('auth');
Route::get('/lien-he', ContactPage::class);
Route::put('/account/{id}', [UserController::class, 'updateAccount'])->name('account.put');
Route::post('/upload-file', [UploadFileController::class, 'index'])->name('upload');


require __DIR__ . '/auth.php';

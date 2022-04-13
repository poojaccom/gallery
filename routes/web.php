<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\MyAdmin;
use App\Http\Controllers\Front_end\GalleryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// --------------Route for admin start here----------------------------------------------------
Route::get('/', [MyAdmin::class, 'admin_register'])->name('admin.reg'); 
Route::post('/admin/save', [MyAdmin::class, 'admin_save'])->name('admin.save'); 
Route::get('/admin/login', [MyAdmin::class, 'login_admin'])->name('admin.login'); 
Route::post('/admin/login/check', [MyAdmin::class, 'login_admin_check'])->name('admin.login.check');

Route::get('admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('/admin/login');
})->name('admin.logout');
Route::get('/admin/reset',[MyAdmin::class,'reset_password'])->name('reset.pass');
Route::post('/admin/reset/check_reset', [MyAdmin::class, 'save_reset'])->name('save.reset');


Route::get('/admin/reset/token/{reset_token}',[MyAdmin::class,'reset_token'])->name('reset.token');
Route::post('/admin/reset/upadte_pass', [MyAdmin::class, 'update_password'])->name('update.pass');

// --------------Route for admin end here----------------------------------------------------





// --------------Route for category start here----------------------------------------------------
Route::get('/Admin/Add_category',[CategoryController::class,'Add_category'])->name('add.category'); 
Route::post('/admin/category/save',[CategoryController::class,'save_category'])->name('save.category');  
Route::get('/Admin/category/list',[CategoryController::class,'category_list'])->name('category.list');
Route::get('/Admin/category/edit_page/{id}',[CategoryController::class,'edit_cat'])->name('category.editpage');
Route::post('/Admin/category/update',[CategoryController::class,'edit_category'])->name('update.category');
Route::get('/Admin/category/delete/{id}',[CategoryController::class,'delete_cat'])->name('category.delete');

Route::get('/Admin/category/drag',[CategoryController::class,'drag'])->name('category.drag');
Route::post('/Admin/category/save/priority',[CategoryController::class,'save_priority'])->name('category.save_priority');
// --------------Route for category end here----------------------------------------------------


// --------------Route for video start here----------------------------------------------------

Route::get('/Admin/Add_video',[VideoController::class,'Add_video'])->name('add.video');
Route::post('/Admin/video/save',[VideoController::class,'save_video'])->name('save.video');
Route::get('/Admin/video/list',[VideoController::class,'video_list'])->name('video.list');
Route::get('/Admin/video/edit_page/{id}',[VideoController::class,'edit_video'])->name('video.editpage');
Route::post('/Admin/video/update',[VideoController::class,'update_video'])->name('update.video');
Route::get('/Admin/video/delete/{id}',[VideoController::class,'delete_video'])->name('video.delete'); 

// --------------Route for video end here----------------------------------------------------


// --------------Route for gallery start here----------------------------------------------------

Route::get('/Front_end/gallery/',[GalleryController::class,'gallery'])->name('gallery'); 
Route::post('/Front_end/gallery/search',[GalleryController::class,'search'])->name('search.gallery');
Route::get('/Front_end/gallery/detail/{id}',[GalleryController::class,'details_page'])->name('details.page');

// --------------Route for gallery end here----------------------------------------------------


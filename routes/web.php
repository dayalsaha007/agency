<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Blog_CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Homeslide;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $home = Homeslide::find(1);
    return view('frontend.index', [
        'home'=>$home,
    ]);
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin_logout');
    Route::get('/admin/profile', 'profile')->name('profile')->middleware('auth');
    Route::get('/admin/profile/edit/{id}', 'profile_edit')->name('profile_edit')->middleware('auth');
    Route::post('/admin/profile/update', 'update_profile')->name('update_profile')->middleware('auth');

});

Route::controller(IndexController::class)->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/home/slide', 'home_slide')->name('home_slide');
    Route::get('/home/edit/{id}', 'edit_home_slide')->name('edit_home_slide');
    Route::post('/home/slide/update', 'update_home_slide')->name('update_home_slide');

});

Route::controller(ServiceController::class)->group(function(){

    Route::get('/service',  'service')->name('service');

});


Route::controller(ContactController::class)->group(function(){
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/backend/contact', 'back_contact')->name('back_contact');
    Route::post('/store/contact', 'store_contact')->name('store_contact');
    Route::get('/del/contact/{id}', 'del_contact')->name('del_contact');

});



Route::controller(AboutController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/back/about', 'back_about')->name('back_about');
    Route::get('/back/about/edit/{id}', 'back_about_edit')->name('back_about_edit');
    Route::post('/back/about/update', 'update_about')->name('update_about');

    Route::get('/about/multi/image', 'multi_image')->name('multi_image');
    Route::post('/store/multiimage', 'multi_image_store')->name('multi_image_store');
    Route::get('/show/multiimage', 'multi_image_show')->name('multi_image_show');
    Route::get('/edit/image/{id}', 'edit_multi_image')->name('edit_multi_image');
    Route::post('/update/image/', 'multi_image_update')->name('multi_image_update');

});


Route::controller(PortfolioController::class)->group(function(){
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/add/portfolio', 'add_portfolio')->name('add_portfolio');
    Route::post('/store/portfolio', 'store_portfolio')->name('store_portfolio');
    Route::get('/edit/portfolio/{id}', 'edit_portfolio')->name('edit_portfolio');
    Route::post('/update/portfolio', 'update_portfolio')->name('update_portfolio');
    Route::get('/get/portfolio/{id}', 'del_portfolio')->name('del_portfolio');
    Route::get('/detail/portfolio/{id}', 'portfolio_detail')->name('portfolio_detail');
    Route::get('/show/portfolio/', 'show_portfolio')->name('show_portfolio');

});


Route::controller(Blog_CategoryController::class)->group(function(){
    Route::get('/add/blog/category', 'add_blog_category')->name('add_blog_category');
    Route::post('/store/blog/category', 'store_blog_category')->name('store_blog_category');
    Route::get('/all/blog/category', 'all_blog_category')->name('all_blog_category');
    Route::get('/edit/blog/category/{id}', 'edit_blog_category')->name('edit_blog_category');
    Route::post('/update/blog/category', 'update_blog_category')->name('update_blog_category');
    Route::get('/delete/blog/category/{id}', 'del_blog_category')->name('del_blog_category');
    Route::get('/add/blog', 'add_blog')->name('add_blog');
    Route::get('/all/blog', 'all_blog')->name('all_blog');
    Route::post('/store/blog', 'store_blog')->name('store_blog');

});


Route::controller(BlogController::class)->group(function(){
    Route::get('/add/blog', 'add_blog')->name('add_blog');
    Route::get('/all/blog', 'all_blog')->name('all_blog');
    Route::post('/store/blog', 'store_blog')->name('store_blog');
    Route::get('/edit/blog/{id}', 'edit_blog')->name('edit_blog');
    Route::post('/update/blog', 'update_blog')->name('update_blog');
    Route::get('/delete/blog/{id}', 'del_blog')->name('del_blog');
    Route::get('/blog/detail/{id}', 'blog_detail')->name('blog_detail');
    Route::get('/blog/cat/detail/{id}', 'blog_cat_detail')->name('blog_cat_detail');
    Route::get('/blog', 'blog')->name('blog');


});



Route::controller(FooterController::class)->group(function(){
    Route::get('/footer', 'footer')->name('footer');
    Route::post('/update/footer', 'update_footer')->name('update_footer');


});





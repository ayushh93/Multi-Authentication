<?php

use App\Http\Controllers\Admin\AboutOtherDetailController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageFromDirectorController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\TermsandConditionController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\WhoareweController;
use App\Http\Controllers\Admin\WhyusController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Models\Whoarewe;
use Illuminate\Support\Facades\Route;

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
/* 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 */

require __DIR__ . '/auth.php';

//frontend routes
Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

Route::prefix('about')->name('about.')->group(function () {
    Route::get('/whyus', [PageController::class, 'whyus'])->name('whyus');
    Route::get('/message-from-director', [PageController::class, 'messagefromdirector'])->name('message');
    Route::get('/whoarewe', [PageController::class, 'whoarewe'])->name('whoarewe');
    Route::get('/our-team', [PageController::class, 'ourteam'])->name('ourteam');
    Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
    Route::get('/documents', [PageController::class, 'documents'])->name('documents');
});

Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact/submit',[ContactController::class,'store'])->name('contact.submit');
Route::get('/blogs/{slug}', [PageController::class, 'blogsingle'])->name('blogsingle');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/videogallery', [PageController::class, 'videogallery'])->name('videogallery');
Route::get('/package/{id}', [PageController::class, 'packagesingle'])->name('packagesingle');
Route::get('/privacy-policy', [PageController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/terms-and-conditions', [PageController::class, 'termsandcondition'])->name('termsandcondition');




//backend routes 
//admin login
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        //login route
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    });
    //protected routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        //site setting routes
        Route::get('/site_setting/index', [SiteSettingController::class, 'index'])->name('site.index');
        Route::get('/site_setting/{id}/edit', [SiteSettingController::class, 'edit'])->name('site.edit');
        Route::post('/site_setting/{id}/update', [SiteSettingController::class, 'update'])->name('site.update');

        //contact details
        Route::get('/contact-detail', [ContactDetailController::class, 'index'])->name('contactdetail.index');
        Route::get('/contact-detail/{id}/edit', [ContactDetailController::class, 'edit'])->name('contactdetail.edit');
        Route::post('/contact-detail/{id}/update', [ContactDetailController::class, 'update'])->name('contactdetail.update');

        //contact routes
        Route::get('/contact/index',[ContactController::class,'index'])->name('contact.index');
        Route::post('/contact/{id}/delete',[ContactController::class,'destroy'])->name('contact.destroy');
        Route::get('/contact-status/update', [ContactController::class, 'updateContactStatus'])->name('contact.update.status');

        //gallery
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::post('/store', [GalleryController::class, 'store'])->name('store');
            Route::post('/{id}/delete', [GalleryController::class, 'destroy'])->name('destroy');
            //video gallery
            Route::resource('video', VideoGalleryController::class);
        });

        //resource controller
        Route::resource('/blogs', BlogController::class);
        Route::resource('/clients', ClientController::class);
        Route::resource('/sliders', SliderController::class);
        Route::resource('/termsandcondition', TermsandConditionController::class);
        Route::resource('/privacypolicy', PrivacyPolicyController::class);
        //package management
        Route::prefix('package-management')->name('package.')->group(function () {
            Route::resource('/categories', CategoryController::class);
            Route::resource('/subcategories', SubcategoryController::class);

            Route::get('/packages/{id}/addgallery', [PackageController::class, 'addGallery'])->name('addgallery');
            Route::post('/packages/storegallery', [PackageController::class, 'storeGallery'])->name('storegallery');
            Route::post('/packages/{id}/deletegallery', [PackageController::class, 'deleteGallery'])->name('deletegallery');

            Route::get('/packages/{id}/recommended-gears', [PackageController::class, 'recommendedGears'])->name('recommendedgears');
            Route::post('/packages/recommended-gears/{id}/update', [PackageController::class, 'updaterecommendedGears'])->name('updaterecommendedgears');

            Route::get('/packages/{id}/itinerary', [PackageController::class, 'itinerary'])->name('itinerary');
            Route::post('/packages/itinerary', [PackageController::class, 'storeitinerary'])->name('storeitinerary');
            Route::post('/packages/itinerary/{id}/update', [PackageController::class, 'updateitinerary'])->name('updateitinerary');
            Route::get('/packages/itinerary/{id}/delete', [PackageController::class, 'deleteitinerary'])->name('deleteitinerary');

            Route::get('/packages/{id}/costdetail', [PackageController::class, 'costdetail'])->name('costdetail');
            Route::post('/packages/costdetail', [PackageController::class, 'storecostdetail'])->name('storecostdetail');
            Route::post('/packages/costdetail/{id}/update', [PackageController::class, 'updatecostdetail'])->name('updatecostdetail');
            Route::get('/packages/costdetail/{id}/delete', [PackageController::class, 'deletecostdetail'])->name('deletecostdetail');

            Route::get('/packages/{id}/cost-description', [PackageController::class, 'costdescription'])->name('costdescription');
            Route::post('/packages/cost-description/{id}/update', [PackageController::class, 'updatecostdescription'])->name('updatecostdescription');

            Route::resource('/packages', PackageController::class);
        });

        //about pages
        Route::prefix('about')->name('about.')->group(function () {
            Route::resource('/whyus', WhyusController::class);
            Route::resource('/ourteam', OurTeamController::class);
            Route::resource('/reviews', ReviewController::class);
            Route::resource('/messagefromdirector', MessageFromDirectorController::class);
            Route::resource('/whoarewe', WhoareweController::class);
            Route::resource('/otherdetails', AboutOtherDetailController::class);
            Route::resource('/documents', DocumentController::class);
        });
    });
});

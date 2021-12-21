<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\FrontendController;
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
// Route::domain('{account}.localhost')->group(function () {
//     Route::get('abc', function ($account) {
//         return response($account);
//     })->name('abc');
//      Route::get('xyz', function ($account) {
//         return response(route('abc','robin-singh'));
//     })->name('xyz');
// });
// Route::domain('{account}.socialcrm.iamnotworking.online')->group(function () {

// Route::domain('{account}.localhost',[FrontendController::class, 'profile'])->name('profile');
Route::domain(__('crud.settings.project_url'))->group( function () {
    // Route::get('/', [FrontendController::class, 'profile'])->name('profile');
   Route::get('/', [FrontendController::class, 'index'])->name('home')->middleware('loginVarified');

});
Route::domain('{account}.'.__('crud.settings.project_url'))->group(function () {
    Route::get('/', [FrontendController::class, 'profile'])->name('profile')->middleware('loginVarified');
    Route::post('/add-review', [FrontendController::class, 'addReview'])->name('add-review')->middleware('auth','verified');
    Route::post('/update-profile', [FrontendController::class, 'updateProfile'])->name('update-profile')->middleware('auth','verified');
});
Route::get('/dashboard', function(){
    return redirect()->route('dashboard');
});
Route::group(['middleware' =>['auth','verified'],'prefix'=>'admin'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// permissions
    //

    Route::prefix('user-management')->group(function () {
        Route::get('/permissions', [UserManagementController::class, 'permissions'])->middleware(['permission:view_permissions'])->name('permissions');
        Route::any('/permissions/create', [UserManagementController::class, 'permissionsCreate'])->middleware(['permission:create_permissions'])->name('permissions-create');
        Route::any('/permissions/edit/{id}', [UserManagementController::class, 'permissionsEdit'])->middleware(['permission:update_permissions'])->name('permissions-edit');
        Route::post('/permissions/update', [UserManagementController::class, 'permissionsUpdate'])->middleware(['permission:update_permissions'])->name('permissions-update');
        Route::any('/permissions/delete/{id}', [UserManagementController::class, 'permissionsDelete'])->middleware(['permission:delete_permissions'])->name('permissions-delete');
        // roles
        Route::get('/roles', [UserManagementController::class, 'roles'])->middleware(['permission:view_roles'])->name('roles');
        Route::any('/roles/create', [UserManagementController::class, 'rolesCreate'])->middleware(['permission:create_roles'])->name('roles-create');
        Route::any('/roles/edit/{id}', [UserManagementController::class, 'rolesEdit'])->middleware(['permission:update_roles'])->name('roles-edit');
        Route::post('/roles/update', [UserManagementController::class, 'rolesUpdate'])->middleware(['permission:update_roles'])->name('roles-update');
        Route::any('/roles/delete/{id}', [UserManagementController::class, 'rolesDelete'])->middleware(['permission:delete_roles'])->name('roles-delete');

        // Users
        Route::get('/'. __('crud.users.slug'), [UserManagementController::class, 'users'])->middleware(['permission:view_users'])->name('users');
        Route::get('/'. __('crud.users.slug').'/all-users-ajax', [UserManagementController::class, 'allUsersAjax'])->middleware(['permission:view_users'])->name('all-users-ajax');
        Route::any('/'. __('crud.users.slug').'/create', [UserManagementController::class, 'usersCreate'])->middleware(['permission:create_users'])->name('users-create');
        Route::any('/'. __('crud.users.slug').'/edit/{id}', [UserManagementController::class, 'usersEdit'])->middleware(['permission:update_users'])->name('users-edit');
        Route::post('/'. __('crud.users.slug').'/update', [UserManagementController::class, 'usersUpdate'])->middleware(['permission:update_users'])->name('users-update');
        Route::any('/'. __('crud.users.slug').'/delete/{id}', [UserManagementController::class, 'usersDelete'])->middleware(['permission:delete_users'])->name('users-delete');
        Route::any('/'. __('crud.users.slug').'/status/{id}', [UserManagementController::class, 'changeStatus'])->middleware(['permission:status_change_users'])->name('users-change-status');

        // Users

        Route::get('/'.__('crud.staff.slug'), [UserManagementController::class, 'staff'])->middleware(['permission:view_staff'])->name('staff');
        Route::get('/'.__('crud.staff.slug').'/all-staff-ajax', [UserManagementController::class, 'allStaffAjax'])->middleware(['permission:view_staff'])->name('all-staff-ajax');
        Route::any('/'.__('crud.staff.slug').'/create', [UserManagementController::class, 'staffCreate'])->middleware(['permission:create_staff'])->name('staff-create');
        Route::any('/'.__('crud.staff.slug').'/edit/{id}', [UserManagementController::class, 'staffEdit'])->middleware(['permission:update_staff'])->name('staff-edit');
        Route::post('/'.__('crud.staff.slug').'/update', [UserManagementController::class, 'staffUpdate'])->middleware(['permission:update_staff'])->name('staff-update');
        Route::any('/'.__('crud.staff.slug').'/delete/{id}', [UserManagementController::class, 'staffDelete'])->middleware(['permission:delete_staff'])->name('staff-delete');
        Route::any('/'.__('crud.staff.slug').'/status/{id}', [UserManagementController::class, 'changeStatus'])->middleware(['permission:status_change_staff'])->name('staff-change-status');
    });

    // Customer
    Route::get('/'.__('crud.customers.slug'), [CustomerController::class, 'index'])->middleware(['permission:view_customers'])->name('customers');
    Route::get('/'.__('crud.customers.slug').'/all-customer-ajax', [CustomerController::class, 'allCustomerAjax'])->middleware(['permission:view_customers'])->name('all-customer-ajax');
    Route::any('/'.__('crud.customers.slug').'/create', [CustomerController::class, 'create'])->middleware(['permission:create_customers'])->name('customers-create');
    Route::any('/'.__('crud.customers.slug').'/edit/{id}', [CustomerController::class, 'edit'])->middleware(['permission:update_customers'])->name('customers-edit');
    Route::post('/'.__('crud.customers.slug').'/update', [CustomerController::class, 'update'])->middleware(['permission:update_customers'])->name('customers-update');
    Route::any('/'.__('crud.customers.slug').'/delete/{id}', [CustomerController::class, 'delete'])->middleware(['permission:delete_customers'])->name('customers-delete');
    Route::any('/'.__('crud.customers.slug').'/status/{id}', [CustomerController::class, 'changeStatus'])->middleware(['permission:status_change_customers'])->name('customers-change-status');

    // Brands
    Route::get('/'.__('crud.types.slug'), [TypeController::class, 'index'])->middleware(['permission:view_brands'])->name('types');
    Route::get('/'.__('crud.types.slug').'/all-brands-ajax', [TypeController::class, 'allTypesAjax'])->middleware(['permission:view_brands'])->name('all-types-ajax');
    Route::any('/'.__('crud.types.slug').'/create', [TypeController::class, 'create'])->middleware(['permission:create_brands'])->name('types-create');
    Route::any('/'.__('crud.types.slug').'/edit/{id}', [TypeController::class, 'edit'])->middleware(['permission:update_brands'])->name('types-edit');
    Route::post('/'.__('crud.types.slug').'/update', [TypeController::class, 'update'])->middleware(['permission:update_brands'])->name('types-update');
    Route::any('/'.__('crud.types.slug').'/delete/{id}', [TypeController::class, 'delete'])->middleware(['permission:delete_brands'])->name('types-delete');
    Route::any('/'.__('crud.types.slug').'/status/{id}', [TypeController::class, 'changeStatus'])->middleware(['permission:status_change_brands'])->name('types-change-status');

    // categories
    Route::get('/'.__('crud.categories.slug'), [CategoryController::class, 'index'])->middleware(['permission:view_categories'])->name('categories');
    Route::get('/'.__('crud.categories.slug').'/all-categories-ajax', [CategoryController::class, 'allCategoriesAjax'])->middleware(['permission:view_categories'])->name('all-categories-ajax');
    Route::any('/'.__('crud.categories.slug').'/create', [CategoryController::class, 'create'])->middleware(['permission:create_categories'])->name('categories-create');
    Route::any('/'.__('crud.categories.slug').'/edit/{id}', [CategoryController::class, 'edit'])->middleware(['permission:update_categories'])->name('categories-edit');
    Route::post('/'.__('crud.categories.slug').'/update', [CategoryController::class, 'update'])->middleware(['permission:update_categories'])->name('categories-update');
    Route::any('/'.__('crud.categories.slug').'/delete/{id}', [CategoryController::class, 'delete'])->middleware(['permission:delete_categories'])->name('categories-delete');
    Route::any('/'.__('crud.categories.slug').'/status/{id}', [CategoryController::class, 'changeStatus'])->middleware(['permission:status_change_categories'])->name('categories-change-status');//

    
    // reviews
    Route::get('/reviews', [ReviewsController::class, 'index'])->middleware(['permission:view_reviews'])->name('reviews');
    Route::get('/all-reviews-ajax', [ReviewsController::class, 'allReviewsAjax'])->middleware(['permission:view_reviews'])->name('all-reviews-ajax');
    Route::any('/reviews/create', [ReviewsController::class, 'create'])->middleware(['permission:create_reviews'])->name('reviews-create');
    Route::any('/reviews/edit/{id}', [ReviewsController::class, 'edit'])->middleware(['permission:update_reviews'])->name('reviews-edit');
    Route::post('/reviews/update', [ReviewsController::class, 'update'])->middleware(['permission:update_reviews'])->name('reviews-update');
    Route::any('/reviews/delete/{id}', [ReviewsController::class, 'delete'])->middleware(['permission:delete_reviews'])->name('reviews-delete');
    
    
    // // Products
    // Route::get('/products', [ProductController::class, 'index'])->middleware(['permission:view_products'])->name('products');
    // Route::get('/all-products-ajax', [ProductController::class, 'allProductsAjax'])->middleware(['permission:view_products'])->name('all-products-ajax');
    // Route::any('/products/create', [ProductController::class, 'create'])->middleware(['permission:create_products'])->name('products-create');
    // Route::any('/products/edit/{id}', [ProductController::class, 'edit'])->middleware(['permission:update_products'])->name('products-edit');
    // Route::post('/products/update', [ProductController::class, 'update'])->middleware(['permission:update_products'])->name('products-update');
    // Route::any('/products/delete/{id}', [ProductController::class, 'delete'])->middleware(['permission:delete_products'])->name('products-delete');
    // Route::any('/products/status/{id}', [ProductController::class, 'changeStatus'])->middleware(['permission:status_change_products'])->name('product-change-status');
    
    // // packages
    // Route::get('/packages', [PackageController::class, 'index'])->middleware(['permission:view_packages'])->name('packages');
    // Route::get('/packages/all-packages-ajax', [PackageController::class, 'allPackagesAjax'])->middleware(['permission:view_packages'])->name('all-packages-ajax');
    // Route::any('/packages/create', [PackageController::class, 'create'])->middleware(['permission:create_packages'])->name('packages-create');
    // Route::any('/packages/edit/{id}', [PackageController::class, 'edit'])->middleware(['permission:update_packages'])->name('packages-edit');
    // Route::post('/packages/update', [PackageController::class, 'update'])->middleware(['permission:update_packages'])->name('packages-update');
    // Route::any('/packages/delete/{id}', [PackageController::class, 'delete'])->middleware(['permission:delete_packages'])->name('packages-delete');
    // Route::any('/packages/status/{id}', [PackageController::class, 'changeStatus'])->middleware(['permission:status_change_packages'])->name('packages-change-status');

});

require __DIR__.'/auth.php';

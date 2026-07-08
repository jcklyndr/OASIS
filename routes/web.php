<?php

use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index'); // new welcome page. after slash ppwede lagyan yan ng on-the-go relaxation
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');

// For displaying the contact form
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.form');

// For handling the form submission
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

// //for contact (email sending)
// // Route::get('/contact', [App\Http\Controllers\HomeController::class, 'show']); // yung contact dat show din?
// Route::post('/contact',[App\Http\Controllers\HomeController::class, 'send'])->name('send-mail');


Route::group(['prefix'=> 'branches'], function () {
    // Branch routes
    Route::get('/roomspaservices/{id}', [App\Http\Controllers\branches\branchesController::class, 'roomspaservices'])->name('branches.roomspaservices');
    Route::get('/roomspaservices-details/{id}', [App\Http\Controllers\branches\branchesController::class, 'servicedetails'])->name('branches.roomspaservices.details'); 
    Route::post('/roomspaservices-booking/{id}', [App\Http\Controllers\branches\branchesController::class, 'servicebooking'])->name('branches.roomspaservices.booking');

    // Payment routes
    Route::get('/payment', [App\Http\Controllers\branches\branchesController::class, 'payWithPaypal'])->name('branches.payment')->middleware('check.for.price'); // Middleware to prevent unauthorized access
    Route::get('/success', [App\Http\Controllers\branches\branchesController::class, 'success'])->name('branches.success')->middleware('check.for.price');

    // PayPal integration routes
    Route::post('/create-paypal-order', [App\Http\Controllers\PayPalController::class, 'createOrder'])->name('paypal.createOrder');
    Route::post('/capture-paypal-order', [App\Http\Controllers\PayPalController::class, 'captureOrder'])->name('paypal.captureOrder');
});


//for users
Route::get('users/my-bookings', [App\Http\Controllers\Users\UsersController::class, 'mybookings'])->name('users.bookings')->middleware('auth:web');

// Admin routes hidden
Route::get('admin/login', [App\Http\Controllers\admins\adminsController::class, 'viewlogin'])->name('admin.login')->middleware('check.for.login');
Route::post('admin/login', [App\Http\Controllers\admins\adminsController::class, 'seelogin'])->name('admin.login.submit');

Route::group(['prefix'=> 'admin','middleware' => 'auth:admin'], function (){ 

    Route::get('/index', [App\Http\Controllers\admins\adminsController::class, 'index'])->name('admins.dashboard');

    //sa admins
    Route::get('/all-admins', [App\Http\Controllers\admins\adminsController::class, 'alladmins'])->name('admins.all');
    Route::get('/create-admins', [App\Http\Controllers\admins\adminsController::class, 'createadmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\admins\adminsController::class, 'storeadmins'])->name('admins.store');
    //
    Route::get('/edit-admins/{id}', [App\Http\Controllers\admins\adminsController::class, 'editadmins'])->name('admins.edit');
    Route::post('/update-admins/{id}', [App\Http\Controllers\admins\adminsController::class, 'updateadmins'])->name('admins.update');
    Route::get('/delete-admins/{id}', [App\Http\Controllers\admins\adminsController::class, 'deleteadmins'])->name('admins.delete');

    
    //for branches na routes sa admin
    Route::get('/all-branches', [App\Http\Controllers\admins\adminsController::class, 'allbranches'])->name('branches.all');
    Route::get('/create-branches', [App\Http\Controllers\admins\adminsController::class, 'createbranches'])->name('branches.create');
    Route::post('/create-branches', [App\Http\Controllers\admins\adminsController::class, 'storebranches'])->name('branches.store');

    Route::get('/edit-branches/{id}', [App\Http\Controllers\admins\adminsController::class, 'editbranches'])->name('branches.edit');
    Route::post('/update-branches/{id}', [App\Http\Controllers\admins\adminsController::class, 'updatebranches'])->name('branches.update');
    Route::get('/delete-branches/{id}', [App\Http\Controllers\admins\adminsController::class, 'deletebranches'])->name('branches.delete');
    
    //for services offered
    Route::get('/all-roomspa', [App\Http\Controllers\admins\adminsController::class, 'allroomspa'])->name('roomspa.all');
    Route::get('/create-roomspa', [App\Http\Controllers\admins\adminsController::class, 'createroomspa'])->name('roomspa.create');
    Route::post('/create-roomspa', [App\Http\Controllers\admins\adminsController::class, 'storeroomspa'])->name('roomspa.store');
    Route::get('/edit-roomspa/{id}', [App\Http\Controllers\admins\adminsController::class, 'editroomspa'])->name('roomspa.edit');
    Route::post('/update-roomspa/{id}', [App\Http\Controllers\admins\adminsController::class, 'updateroomspa'])->name('roomspa.update');
    Route::get('/delete-roomspa/{id}', [App\Http\Controllers\admins\adminsController::class, 'deleteroomspa'])->name('roomspa.delete');

    //for bookings sa admin side
    Route::get('/all-bookings', [App\Http\Controllers\admins\adminsController::class, 'allbookings'])->name('bookings.all');
    Route::get('/update-status/{id}', [App\Http\Controllers\admins\adminsController::class, 'updatestatus'])->name('bookings.updatestatus');
    Route::post('/updated-status/{id}', [App\Http\Controllers\admins\adminsController::class, 'updatedstatus'])->name('bookings.updatedstatus');
    Route::get('/delete-bookings/{id}', [App\Http\Controllers\admins\adminsController::class, 'deletebookings'])->name('bookings.delete');










    
    



});






<?php

use App\Models\User;
use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomsGenerationController;
use App\Http\Controllers\TransactionRoomReservationController;
use App\Http\Controllers\SearchingController;
use App\Http\Controllers\RoomStatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
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

Route::view('/test', 'test');

// Route::post('/home', 'SearchingController@index')->name('home');
// Route::post('/homef', 'SearchingController@homeSearch')->name('home.filtred');
// Route::post('/', 'SearchingController@index')->name('home');
Route::get('/', [SearchingController::class, 'index'])->name('home');

Route::controller(EmailController::class)->group(function() {
    Route::get('/send/{name}/{senderEmail}/{receiverEmail}/{message}','send');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/validate/{id}', 'index');
});

Route::get('/valide/{id}', 'UserController@valide')->name('user.valide');

Route::group(['middleware' => ['auth', 'checkRole:Super', 'validation']], function () {
    Route::resource('user', UserController::class);
});

Route::group(['middleware' => ['auth', 'checkRole:Customer,Super,Admin', 'validation']], function () {
    Route::resource('hotel', HotelController::class);
});
Route::group(['middleware' => ['auth', 'checkRole:Super,Admin', 'validation']], function () {
    Route::post('/room/{room}/image/upload', [ImageController::class, 'store'])->name('image.store');
    Route::delete('/image/{image}', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::delete('/room/destroy/{id}', 'RoomController@destroy');

    Route::name('transaction.reservation.')->group(function () {
        Route::get('/createIdentity', [TransactionRoomReservationController::class, 'createIdentity'])->name('createIdentity');
        Route::get('/pickFromCustomer', [TransactionRoomReservationController::class, 'pickFromCustomer'])->name('pickFromCustomer');
        Route::post('/storeCustomer', [TransactionRoomReservationController::class, 'storeCustomer'])->name('storeCustomer');
        Route::get('/{customer}/viewCountPerson', [TransactionRoomReservationController::class, 'viewCountPerson'])->name('viewCountPerson');
        Route::get('/{customer}/chooseRoom', [TransactionRoomReservationController::class, 'chooseRoom'])->name('chooseRoom');
        Route::get('/{customer}/{room}/{from}/{to}/confirmation', [TransactionRoomReservationController::class, 'confirmation'])->name('confirmation');
        Route::post('/{customer}/{room}/payDownPayment', [TransactionRoomReservationController::class, 'payDownPayment'])->name('payDownPayment');
    });

    Route::resource('searching', SearchingController::class);

    Route::post('/generate', 'RoomsGenerationController@generate')->name('generate');

    Route::resource('customer', CustomerController::class);
    Route::resource('type', TypeController::class);
    Route::resource('room', RoomController::class);
    Route::resource('roomstatus', RoomStatusController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('facility', FacilityController::class);

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/{payment}/invoice', [PaymentController::class, 'invoice'])->name('payment.invoice');

    Route::get('/transaction/{transaction}/payment/create', [PaymentController::class, 'create'])->name('transaction.payment.create');
    Route::post('/transaction/{transaction}/payment/store', [PaymentController::class, 'store'])->name('transaction.payment.store');

    Route::get('/get-dialy-guest-chart-data', [ChartController::class, 'dialyGuestPerMonth']);
    Route::get('/get-dialy-guest/{year}/{month}/{day}', [ChartController::class, 'dialyGuest'])->name('chart.dialyGuest');
});

Route::group(['middleware' => ['auth', 'checkRole:Super,Admin', 'validation']], function () {
    Route::resource('user', UserController::class)->only([
        'show'
    ]);

    Route::view('/notification', 'notification.index')->name('notification.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



    Route::get('/mark-all-as-read', [NotificationsController::class, 'markAllAsRead'])->name('notification.markAllAsRead');

    Route::get('/notification-to/{id}', [NotificationsController::class, 'routeTo'])->name('notification.routeTo');
});

Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/login', 'auth.login')->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postlogin');

Route::view('/choose', 'auth.choose')->name('choose');

Route::view('/register', 'auth.register')->name('register');
Route::post('/admin_registration', [AuthController::class, 'storeAdmin'])->name('auth.store');
Route::view('/form_hotel', 'auth.hotel')->name('hotel.form');
Route::post('/add_hotel', [HotelController::class, 'store'])->name('hotel.store');

Route::view('/customer_register', 'auth.customer.register')->name('custom.register');
Route::post('/custom_registration', [AuthController::class, 'storeCustomer'])->name('auth.customer.store');

Route::get('/waiting', [AuthController::class, 'waiting'])->name('waiting');

Route::get('/email_form/{receiverEmail}', [EmailController::class, 'index'])->name('email_form');
Route::get('/send_email', [EmailController::class, 'Send'])->name('email.send');


Route::get('/sendEvent', function () {
    $superAdmins = User::where('role', 'Super')->get();
    event(new RefreshDashboardEvent("Someone reserved a room"));

    foreach ($superAdmins as $superAdmin) {
        $message = 'Reservation added by';
        // event(new NewReservationEvent($message, $superAdmin));
    }
});

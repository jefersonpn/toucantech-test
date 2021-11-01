<?php
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
                            WelcomeController,
                            AboutController,
                            ServiceController,
                            CrudMembersController,
                            SchoolsController
};;

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

Route::get('/member', function () {

    return view('index', $members, $schools);
});

Route::post('member/create', [ CrudMembersController::class, 'store' ])->name('member.create');
Route::resource('/member', CrudMembersController::class);
Route::resource('/create', CrudMembersController::class);
Route::post('/member', [ CrudMembersController::class, 'filter' ])->name('member.filter');


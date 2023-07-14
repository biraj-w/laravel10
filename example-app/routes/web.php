<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    // return view('welcome');
// fetch all the users
//    $users= DB::select("select * from users");

// $users=DB::table('users')->first();
$users=DB::table('users')->find(8);


   // Traditional Raw Query
//   where email= ?",['biraj.accessworld@gmail.com']);
//  $user= DB::insert('insert into users (name, email, password) values (?,?,?)', ['Birangana', 'birangana@gmail.com', 'password',]);
//  $user = DB::update("UPDATE users SET email=? WHERE id=?", ['xyz@gmail.com', 8]);
//  $user= DB::delete("DELETE from users where id=10");

//Query Builder Method
// $users = DB:: table('users')->where('id',8)->get();
// $user= DB::table('users')-> insert(
//     [
//         'name'=>'Samundra',
//         'email'=>'samundra@gmail.com',
//         'password'=>'samundra'
//     ]);
// $user = DB::table('users')->where('id', 11)->update(['email' => 'namisamundra@bitfumes.com']);
// $user = DB::table('users')->where('id', 11)->delete();
dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

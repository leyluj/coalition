<?php
use Illuminate\Support\Facades\File;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    if (Storage::disk('local')->exists('products.json')) {
        $db = Storage::disk('local')->get('products.json');
        $decoded_db = json_decode($db, true);
    }
    return view('products', compact('decoded_db'));
});

Route::post('/', function () {

    $payload = request()->input();
    $payload['date'] = now()->toDateTimeLocalString();

    // check if it exists 
    if (Storage::disk('local')->exists('products.json')) {
        $db = Storage::disk('local')->get('products.json');
        $decoded_db = json_decode($db);
        array_push($decoded_db, $payload);
        Storage::disk('local')->put('products.json', json_encode($decoded_db));
    } else {
        $db = '[]';
        $decoded_db = json_decode($db);
        array_push($decoded_db, $payload);
        Storage::disk('local')->put('products.json', json_encode($decoded_db));
    }
    return $decoded_db;
})->name('store');

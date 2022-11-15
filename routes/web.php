<?php

use Illuminate\Support\Facades\Route;
use Elastic\Elasticsearch;
use Elastic\Elasticsearch\ClientBuilder;
use App\Http\Controllers\Authorscontroller;
use app\Http\Controllers\MainController;

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

Route::post('/elastics', function () {
    $client = Elasticsearch\ClientBuilder::create()->build();
    var_dump($client);});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    return view('insert');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/welcomesearch', 'App\Http\Controllers\MainController@welcomesearch');

Route::post('/loginsearch', 'App\Http\Controllers\MainController@loginsearch');


Route::get('/summarypage/{id_abstract}', 'App\Http\Controllers\MainController@data');

Route::get('/summarypage2/{id_abstract}', 'App\Http\Controllers\MainController@data');

Route::post('/insertdetails', 'App\Http\Controllers\MainController@insertdetails');
Route::post('/uploadpdf', 'App\Http\Controllers\MainController@uploadpdf');

Route::get('/pdfopen/{pdf}', 'App\Http\Controllers\MainController@pdfopen');

Route::get('/open_f/{pdf}', 'App\Http\Controllers\MainController@pdfopen');

Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
Route::get('/upload','App\Http\Controllers\ElasticController@upload');
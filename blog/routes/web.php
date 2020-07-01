<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/research_action', 'Research@research_action');

Route::get('/', function () {
    return view('index');
});
Route::get('/tech01', function () {
    return view('tech01');
});
Route::get('/tech02', function () {
    return view('tech02');
});
Route::get('/tech03', function () {
    return view('tech03');
});
Route::get('/tech04', function () {
    return view('tech04');
});
Route::get('/tech05', function () {
    return view('tech05');
});
Route::get('/tech06', function () {
    return view('tech06');
});

Route::get('/institution01', function () {
    return view('institution01');
});
Route::get('/institution02', function () {
    return view('institution02');
});
Route::get('/institution03', function () {
    return view('institution03');
});

Route::get('/dispute01', function () {
    return view('dispute01');
});
Route::get('/dispute02', function () {
    return view('dispute02');
});
Route::get('/dispute03', function () {
    return view('all_board');
});

Route::get('/education01', function () {
    return view('education01');
});
Route::get('/education02', function () {
    return view('all_board');
});
Route::get('/education03', function () {
    return view('education03');
});

Route::get('/happycall01', function () {
    return view('happycall01');
});
Route::get('/happycall02', function () {
    return view('all_board');
});
Route::get('/happycall03', function () {
    return view('all_board');
});

Route::get('/happyCall', 'Board@happyCall');

Route::post('/happy_call_action', 'Board@happy_call_action');

Route::post('/image_upload_action', 'Board@image_upload_action');

Route::post('/image_delete_action', 'Board@image_delete_action');

Route::get('/information01', function () {
    return view('all_board');
});
Route::get('/information02', function () {
    return view('all_board');
});
Route::get('/information03', function () {
    return view('all_board');
});
Route::get('/information04', function () {
    return view('all_board');
});
Route::get('/information05', function () {
    return view('all_board');
});

Route::get('/board_view', function () {
    return view('board_view');
});
Route::get('/board_write', function () {
    return view('board_write');
});

Route::get('/search', function () {
    return view('search');
});

//관리자페이지
Route::get('/ey_pcslider', function () {
    return view('ey_main');
});
Route::get('/ey_pcpopup', function () {
    return view('ey_main');
});
Route::get('/ey_moslider', function () {
    return view('ey_main');
});
Route::get('/ey_mopopup', function () {
    return view('ey_main');
});
Route::get('/ey_faq', function () {
    return view('ey_community');
});
Route::get('/ey_notice', function () {
    return view('ey_community');
});
Route::get('/ey_free', function () {
    return view('ey_community');
});
Route::get('/ey_consul', function () {
    return view('ey_community');
});
Route::get('/ey_education', function () {
    return view('ey_community');
});

//관리자 게시글 수정 및 등록
Route::get('/ey_write_notice', function () {
    return view('ey_write_notice');
});
Route::get('/ey_write_gallery', function () {
    return view('ey_write_gallery');
});
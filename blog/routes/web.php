<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image as Image;

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


Route::get('/', 'Main@main');
/*
Route::get('/', function () {
    return view('index');
});
*/
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
    return view('dispute03');
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

Route::get('/request_education', 'RequestProcess@request_form');
Route::post('/request_education/request_education_action2', 'RequestProcess@request_education_action2');
Route::post('/request_education/request_education_action', 'RequestProcess@request_education_action');

Route::get('/ey_cso_request_education', 'RequestProcess@cso_request_list');
Route::get('/ey_cso_request_education/ey_write_notice/modify', 'RequestProcess@ey_modify_cso');

Route::get('/ey_security_request_education', 'RequestProcess@security_request_list');
Route::get('/ey_security_request_education/ey_write_notice/modify', 'RequestProcess@ey_modify_security');

Route::get('/happy_call', 'Board@happyCall');
Route::post('/happy_call/happy_call_action', 'Board@happy_call_action');
Route::post('/happy_call/comment_write_action', 'Board@happy_call_comment_action');
Route::post('/image_upload_action', 'Board@image_upload_action');
Route::post('/image_delete_action', 'Board@image_delete_action');
Route::post('/happy_call/passwd_check_action', 'Board@passwordCheckAction');

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

Route::get('/happy_call/board_write_happy_call', 'Board@happyCallWrite');
Route::get('/happy_call/board_passwd_check', 'Board@happyCallPassCheck');
Route::get('/happy_call/board_view', 'Board@happyCallView');

Route::get('/happy_call/ey_write_notice', 'Board@ey_write_notice');
Route::get('/happy_call/ey_write_notice/modify', 'Board@ey_modify_notice');
Route::get('/happy_call/ey_write_notice/reply', 'Board@ey_reply');
Route::get('/happy_call/happy_call_list', 'Board@ey_notice');
Route::post('/happy_call/ey_board_write_action/reply', 'Board@notice_action');
Route::post('/happy_call/ey_board_write_action', 'Board@notice_action');
Route::post('/happy_call/ey_notice_control', 'Board@notice_control');

Route::get('/notice/notice_list', 'Board@notice_list');
Route::get('/notice/notice_view', 'Board@noticeView');
Route::get('/ey_notice/ey_write_notice', 'Board@ey_write_notice');
Route::get('/ey_notice/ey_write_notice/modify', 'Board@ey_modify_notice');
Route::get('/ey_notice', 'Board@ey_notice');
Route::post('/ey_notice/ey_board_write_action', 'Board@notice_action');
Route::post('/ey_notice/ey_notice_control', 'Board@notice_control');

Route::get('/ey_newsletter/notice_list', 'Board@notice_list');
Route::get('/ey_newsletter/notice_view', 'Board@noticeView');
Route::get('/ey_newsletter/ey_write_notice', 'Board@ey_write_notice');
Route::get('/ey_newsletter/ey_write_notice/modify', 'Board@ey_modify_notice');
Route::get('/ey_newsletter', 'Board@ey_notice');
Route::post('/ey_newsletter/ey_board_write_action', 'Board@notice_action');
Route::post('/ey_newsletter/ey_notice_control', 'Board@notice_control');

Route::get('/ey_data_room/data_room_list', 'Board@notice_list');
Route::get('/ey_data_room/board_view', 'Board@noticeView');
Route::get('/ey_data_room/ey_write_data_room', 'Board@ey_write_notice');
Route::get('/ey_data_room/ey_write_data_room/modify', 'Board@ey_modify_notice');
Route::get('/ey_data_room', 'Board@ey_notice');
Route::post('/ey_data_room/ey_board_write_action', 'Board@notice_action');
Route::post('/ey_data_room/ey_notice_control', 'Board@notice_control');

Route::get('/ey_law_data_room/data_room_list', 'Board@notice_list');
Route::get('/ey_law_data_room/board_view', 'Board@noticeView');
Route::get('/ey_law_data_room/ey_write_data_room', 'Board@ey_write_notice');
Route::get('/ey_law_data_room/ey_write_data_room/modify', 'Board@ey_modify_notice');
Route::get('/ey_law_data_room', 'Board@ey_notice');
Route::post('/ey_law_data_room/ey_board_write_action', 'Board@notice_action');
Route::post('/ey_law_data_room/ey_notice_control', 'Board@notice_control');

Route::get('/ey_security_data_room/data_room_list', 'Board@notice_list');
Route::get('/ey_security_data_room/board_view', 'Board@noticeView');
Route::get('/ey_security_data_room/ey_write_data_room', 'Board@ey_write_notice');
Route::get('/ey_security_data_room/ey_write_data_room/modify', 'Board@ey_modify_notice');
Route::get('/ey_security_data_room', 'Board@ey_notice');
Route::post('/ey_security_data_room/ey_board_write_action', 'Board@notice_action');
Route::post('/ey_security_data_room/ey_notice_control', 'Board@notice_control');

Route::get('/faq/board_view', 'Board@faqView');
Route::get('/faq/faq_list', 'Board@faq_list');

Route::get('/ey_faq/ey_write_faq', 'Board@ey_write_faq');
Route::post('/ey_faq/ey_board_write_action', 'Board@faq_action');
Route::get('/ey_faq/ey_write_faq/modify', 'Board@ey_modify_faq');
Route::get('/ey_faq', 'Board@ey_faq_list');
Route::post('/ey_faq/ey_faq_control', 'Board@faq_control');

Route::get('/search', function () {
    return view('search');
});

Route::get('/ey_login', 'EyAdmin@ey_login');

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
/*
Route::get('/ey_faq', function () {
    return view('ey_community');
});
*/
Route::get('/ey_notice2', function () {
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
/*
Route::get('/ey_write_notice', function () {
    return view('ey_write_notice');
});
*/
Route::get('/ey_write_gallery', function () {
    return view('ey_write_gallery');
});

//사이트맵
Route::get('/sitemap', function () {
    return view('sitemap');
});
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Classes\PagingFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class all_search extends Controller
{
    public function all_search(Request $request){

		$faq_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_faq');

		if($request->search != "") {
			$faq_count->where(function($faq_count) use($request){
				$faq_count->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$faq_count = $faq_count->get()->count();
		
		$faq_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_faq');

		if($request->search != "") {
			$faq_list->where(function($faq_list) use($request){
				$faq_list->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$faq_list = $faq_list->get();

		$notice_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_notice');

		if($request->search != "") {
			$notice_count->where(function($notice_count) use($request){
				$notice_count->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$notice_count = $notice_count->get()->count();
		
		$notice_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_notice');

		if($request->search != "") {
			$notice_list->where(function($notice_list) use($request){
				$notice_list->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$notice_list = $notice_list->get();

		$ey_law_data_room_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_law_data_room');

		if($request->search != "") {
			$ey_law_data_room_count->where(function($ey_law_data_room_count) use($request){
				$ey_law_data_room_count->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_law_data_room_count = $ey_law_data_room_count->get()->count();
		
		$ey_law_data_room_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_law_data_room');

		if($request->search != "") {
			$ey_law_data_room_list->where(function($ey_law_data_room_list) use($request){
				$ey_law_data_room_list->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_law_data_room_list = $ey_law_data_room_list->get();

		$ey_security_data_room_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_security_data_room');

		if($request->search != "") {
			$ey_security_data_room_count->where(function($ey_security_data_room_count) use($request){
				$ey_security_data_room_count->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_security_data_room_count = $ey_security_data_room_count->get()->count();
		
		$ey_security_data_room_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_security_data_room');

		if($request->search != "") {
			$ey_security_data_room_list->where(function($ey_security_data_room_list) use($request){
				$ey_security_data_room_list->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_security_data_room_list = $ey_security_data_room_list->get();

		$ey_data_room_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_data_room');

		if($request->search != "") {
			$ey_data_room_count->where(function($ey_data_room_count) use($request){
				$ey_data_room_count->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_data_room_count = $ey_data_room_count->get()->count();
		
		$ey_data_room_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_data_room');

		if($request->search != "") {
			$ey_data_room_list->where(function($ey_data_room_list) use($request){
				$ey_data_room_list->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_data_room_list = $ey_data_room_list->get();

		$ey_newsletter_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_newsletter');

		if($request->search != "") {
			$ey_newsletter_count->where(function($ey_newsletter_count) use($request){
				$ey_newsletter_count->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_newsletter_count = $ey_newsletter_count->get()->count();
		
		$ey_newsletter_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_newsletter');

		if($request->search != "") {
			$ey_newsletter_list->where(function($ey_newsletter_list) use($request){
				$ey_newsletter_list->where('subject', 'like', '%' . $request->search . '%')
				->orWhere('contents', 'like', '%' . $request->search . '%');
			});
		}

		$ey_newsletter_list = $ey_newsletter_list->get();

		$return_list['faq_count'] = $faq_count;
		$return_list['faq_list'] = $faq_list;
		$return_list['notice_count'] = $notice_count;
		$return_list['notice_list'] = $notice_list;
		$return_list['ey_law_data_room_count'] = $ey_law_data_room_count;
		$return_list['ey_law_data_room_list'] = $ey_law_data_room_list;
		$return_list['ey_security_data_room_count'] = $ey_security_data_room_count;
		$return_list['ey_security_data_room_list'] = $ey_security_data_room_list;
		$return_list['ey_data_room_count'] = $ey_data_room_count;
		$return_list['ey_data_room_list'] = $ey_data_room_list;
		$return_list['ey_newsletter_count'] = $ey_newsletter_count;
		$return_list['ey_newsletter_list'] = $ey_newsletter_list;
        return view('all_search', $return_list);
    }
}

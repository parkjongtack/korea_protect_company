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

class Main extends Controller
{

	public function main(Request $request) {

		$board_list_pcslider_main = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'ey_pcslider')
								->where('category', 'main')
								->where('start_period', '>=', date("Y-m-d"))
								->where('end_period', '>=', date("Y-m-d"))
								->get();		

		$board_list_pcslider_sub = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'ey_pcslider')
								->where('category', 'sub')
								->where('start_period', '>=', date("Y-m-d"))
								->where('end_period', '>=', date("Y-m-d"))
								->get();		

		$board_list_notice = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'ey_notice')
								->limit(3)
								->get();

		$board_list_data_room = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'ey_data_room')
								->limit(3)
								->get();

		$return_list['pcslider_main'] = $board_list_pcslider_main;
		$return_list['pcslider_sub'] = $board_list_pcslider_sub;
		$return_list['notice'] = $board_list_notice;
		$return_list['data_room'] = $board_list_data_room;

		return view('index', $return_list); 
	}

}
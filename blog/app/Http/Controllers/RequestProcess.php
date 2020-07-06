<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Classes\PagingFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class RequestProcess extends Controller
{

	public function ey_modify_security(Request $request) {

		if(request()->segment(1) == "ey_cso_request_education") {
			$tableValue = "cso_education";
		} else if(request()->segment(1) == "ey_security_request_education") {
			$tableValue = "security_education";
		}

		$board_infom = DB::table($tableValue) 
					->select(DB::raw('*'))
					//->where('board_type', request()->segment(1))
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;
		
		/*
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_modify_data_room", $return_list);
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter") {
			return view("board/ey_modify_notice", $return_list);
		}
		*/

		return view("board/security_request_education_modify", $return_list);

	}	

	public function ey_modify_cso(Request $request) {

		if(request()->segment(1) == "ey_cso_request_education") {
			$tableValue = "cso_education";
		} else if(request()->segment(1) == "ey_security_request_education") {
			$tableValue = "security_education";
		}

		$board_infom = DB::table($tableValue) 
					->select(DB::raw('*'))
					//->where('board_type', request()->segment(1))
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;
		
		/*
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_modify_data_room", $return_list);
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter") {
			return view("board/ey_modify_notice", $return_list);
		}
		*/

		return view("board/cso_request_education_modify", $return_list);

	}	

	public function cso_request_list(Request $request) {

		if(request()->segment(1) == "ey_cso_request_education") {
			$tableValue = "cso_education";
		} else if(request()->segment(1) == "ey_security_request_education") {
			$tableValue = "security_education";
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table($tableValue);
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('write_corporation', 'like', '%' . $request->key . '%')
				->orWhere('write_tel', 'like', '%' . $request->key . '%')
				->orWhere('write_email', 'like', '%' . $request->key . '%')
				->orWhere('write_addr1', 'like', '%' . $request->key . '%')
				->orWhere('write_addr2', 'like', '%' . $request->key . '%')
				->orWhere('write_know_reason', 'like', '%' . $request->key . '%')
				->orWhere('write_name', 'like', '%' . $request->key . '%');
			});
		}

		//$totalQuery->where('board_type', $boardType);
        //$totalQuery->where(function($query_set) {
        //        $query_set->where('top_type', '<>', 'Y')
        //        ->orWhere('top_type', null);
        //});

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(1) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table($tableValue)
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('write_corporation', 'like', '%' . $request->key . '%')
				->orWhere('write_tel', 'like', '%' . $request->key . '%')
				->orWhere('write_email', 'like', '%' . $request->key . '%')
				->orWhere('write_addr1', 'like', '%' . $request->key . '%')
				->orWhere('write_addr2', 'like', '%' . $request->key . '%')
				->orWhere('write_know_reason', 'like', '%' . $request->key . '%')
				->orWhere('write_name', 'like', '%' . $request->key . '%');
			});
		}

		//$query->where('board_type', $boardType);
        //$query->where(function($query_set2) {
        //        $query_set2->where('top_type', '<>', 'Y')
        //        ->orWhere('top_type', null);
        //});
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		//if($request->category_type) {
			//$query->where('category', $request->category_type);
		//}

		//if(request()->segment(1) == "ey_data_room" && !$request->category_type) {
		//	$query->where('category', 1);
		//}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		//$board_top_count = DB::table($tableValue) 
					//->select(DB::raw('*'))
					//->where('board_type', $boardType)
					//->where('top_type', 'Y')
					//->get()->count();

		//$board_top_list = DB::table($tableValue) 
					//->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					//->where('board_type', $boardType)
					//->where('top_type', 'Y')
					//->get();

		$return_list = array();
		//$return_list["board_top_count"] = $board_top_count;
		//$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;
		
		/*
		if(request()->segment(1) != "notice" && request()->segment(1) != "ey_newsletter") {
			return view("board/data_room", $return_list);
		} else {
			return view("board/notice_list", $return_list);
		}
		*/

		return view("board/cso_request_education", $return_list);
		
		
	}

	public function security_request_list(Request $request) {

		if(request()->segment(1) == "ey_cso_request_education") {
			$tableValue = "cso_education";
		} else if(request()->segment(1) == "ey_security_request_education") {
			$tableValue = "security_education";
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table($tableValue);
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('write2_corporation', 'like', '%' . $request->key . '%')
				->orWhere('write2_tel', 'like', '%' . $request->key . '%')
				->orWhere('write2_email', 'like', '%' . $request->key . '%')
				->orWhere('writer2_corporation_addr1', 'like', '%' . $request->key . '%')
				->orWhere('writer2_corporation_addr2', 'like', '%' . $request->key . '%')
				->orWhere('write2_know_reason', 'like', '%' . $request->key . '%')
				->orWhere('write2_name', 'like', '%' . $request->key . '%');
			});
		}

		//$totalQuery->where('board_type', $boardType);
        //$totalQuery->where(function($query_set) {
        //        $query_set->where('top_type', '<>', 'Y')
        //        ->orWhere('top_type', null);
        //});

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(1) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table($tableValue)
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('write2_corporation', 'like', '%' . $request->key . '%')
				->orWhere('write2_tel', 'like', '%' . $request->key . '%')
				->orWhere('write2_email', 'like', '%' . $request->key . '%')
				->orWhere('writer2_corporation_addr1', 'like', '%' . $request->key . '%')
				->orWhere('writer2_corporation_addr2', 'like', '%' . $request->key . '%')
				->orWhere('write2_know_reason', 'like', '%' . $request->key . '%')
				->orWhere('write2_name', 'like', '%' . $request->key . '%');
			});
		}

		//$query->where('board_type', $boardType);
        //$query->where(function($query_set2) {
        //        $query_set2->where('top_type', '<>', 'Y')
        //        ->orWhere('top_type', null);
        //});
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		//if($request->category_type) {
			//$query->where('category', $request->category_type);
		//}

		//if(request()->segment(1) == "ey_data_room" && !$request->category_type) {
		//	$query->where('category', 1);
		//}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		//$board_top_count = DB::table($tableValue) 
					//->select(DB::raw('*'))
					//->where('board_type', $boardType)
					//->where('top_type', 'Y')
					//->get()->count();

		//$board_top_list = DB::table($tableValue) 
					//->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					//->where('board_type', $boardType)
					//->where('top_type', 'Y')
					//->get();

		$return_list = array();
		//$return_list["board_top_count"] = $board_top_count;
		//$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;
		
		/*
		if(request()->segment(1) != "notice" && request()->segment(1) != "ey_newsletter") {
			return view("board/data_room", $return_list);
		} else {
			return view("board/notice_list", $return_list);
		}
		*/

		return view("board/security_request_education", $return_list);
		
		
	}

	public function request_form(Request $request) {
		return view("request_education");
	}

	public function request_education_action2(Request $request) {
		
		$file = $request->file_up->store('images');
		$file_array = explode("/", $file);
		copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);

		DB::table('security_education')->insert(
			[
				'writer2_corporation' => $request->writer2_corporation,
				'writer2_name' => $request->writer2_name,
				'writer2_position' => $request->writer2_position,
				'writer2_grade' => $request->writer2_grade,
				'ip_addr' => request()->ip(),
				'writer2_tel' => $request->writer2_tel,
				'writer_email' => $request->writer2_email1."@".$request->writer2_email2,
				'writer2_corporation_addr1' => $request->writer2_corporation_addr1,
				'writer2_corporation_addr2' => $request->writer2_corporation_addr2,
				'writer2_corporation_post' => $request->writer2_corporation_post,
				'writer2_ceo' => $request->writer2_ceo,
				'writer2_divide' => $request->writer2_divide,
				'writer2_education_hope_day' => $request->writer2_education_hope_day,
				'total_money' => $request->total_money,
				'employee_count' => $request->employee_count,
				'education_target' => $request->education_target,
				'education_expect_people' => $request->education_expect_people,
				'corporation_homepage' => $request->corporation_homepage,
				'request_word' => $request->request_word,
				'attach_file' => $file_array[1],
				'reg_date' => \Carbon\Carbon::now(),
			]
		);

		echo "<script>alert('교육신청이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
		exit;		
		
		return view("request_education");
	}

	public function request_education_action(Request $request) {
		
		DB::table('cso_education')->insert(
			[
				'writer_name' => $request->writer_name,
				'writer_sex' => $request->writer_sex,
				'writer_corporation_divide' => $request->writer_corporation_divide,
				'writer_corporation' => $request->writer_corporation,
				'ip_addr' => request()->ip(),
				'writer_grade' => $request->writer_grade,
				'writer_tel' => $request->writer_tel,
				'writer_email' => $request->writer_email1."@".$request->writer_email2,
				'writer_addr1' => $request->writer_addr1,
				'writer_addr2' => $request->writer_addr2,
				'writer_post' => $request->writer_post,
				'writer_know_reason' => $request->writer_know_reason,
				'reg_date' => \Carbon\Carbon::now(),
			]
		);

		echo "<script>alert('교육신청이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
		exit;		
		
		return view("request_education");
	}

}

?>
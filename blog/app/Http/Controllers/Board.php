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

class Board extends Controller
{

	public function ey_write_faq(Request $request) {
		return view("board/ey_write_faq");
	}   

	public function ey_write_notice(Request $request) {
		
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_write_data_room");
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter") {
			return view("ey_write_notice");
		}

	}    

	public function happyCallWrite(Request $request) {
		return view("board_write");
	}

	public function happyCallPassCheck(Request $request) {
		return view("secret_number_write");		
	}

	public function ey_faq_list(Request $request) {

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('board_type', 'ey_faq');
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });


		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', 'ey_faq');
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number =$totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_faq')
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_faq')
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view("board/ey_faq", $return_list);

	}

	public function faq_list(Request $request) {

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('board_type', 'ey_faq');
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });


		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', 'ey_faq');
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number =$totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_faq')
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', 'ey_faq')
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view("board/faq_list", $return_list);

	}

	public function notice_list(Request $request) {

		if(request()->segment(1) != "notice") {
			$boardType = request()->segment(1);
		} else {
			$boardType = "ey_notice";
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(1) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(1) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		if(request()->segment(1) != "notice" && request()->segment(1) != "ey_newsletter") {
			return view("board/data_room", $return_list);
		} else {
			return view("board/notice_list", $return_list);
		}

	}

	public function ey_modify_faq(Request $request) {

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', 'ey_faq')
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;

		return view("board/ey_modify_faq", $return_list);
	}

	public function ey_modify_notice(Request $request) {

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', request()->segment(1))
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;
		
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_modify_data_room", $return_list);
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter") {
			return view("board/ey_modify_notice", $return_list);
		}

	}

	public function happy_call_comment_action(Request $request) {
		
		$comment_cnt = DB::table('COMMENT')
					->where('board_type', $request->board_type)
					->where('board_idx', $request->board_idx)
					->get()->count();

		$answer_infom = DB::table('COMMENT') 
					->select(DB::raw('COMMENT.grp + 1 as grp_now, COMMENT.prino + 1 as prino_now'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->board_idx)
					->orderBy('idx', 'desc')
					->first();

		if($comment_cnt <= 0) {
			$prino_now = 1;
			$grp_now = 1;
		} else {
			$prino_now = $answer_infom->prino_now;
			$grp_now = $answer_infom->grp_now;
		}

		//if(!$answer_infom->prino_now) $answer_infom->prino_now = 1;
		//if(!$answer_infom->grp_now) $answer_infom->grp_now = 1;		

		DB::table('COMMENT')->insert(
			[
				'contents' => $request->comment_contents,
				'writer' => $request->writer,
				'ip_addr' => request()->ip(),
				'board_type' => $request->board_type,
				'board_idx' => $request->board_idx,
				'parno' => 0,
				'prino' => $prino_now,
				'depth' => 1,
				'grp' => $grp_now,
				'reg_date' => \Carbon\Carbon::now(),
			]
		);

		echo "<script>alert('댓글 작성이 완료되었습니다.');location.href = '/".$request->board_type."/board_view/?idx=".$request->board_idx."&board_type=".$request->board_type."';</script>";
		exit;

	}

	public function faqView(Request $request) {
		
		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', $request->idx)
					->first();
		/*
		if($board_infom->secret_status == "Y") {
			
			echo "<script>alert('비밀글입니다.');location.href='/happy_call/board_passwd_check?idx=".$request->idx."&board_type=".$request->board_type."';</script>";
			exit;

		}
		*/	

		$return_list["data"] = $board_infom;
		
		$board_next_infom_cnt = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', '>', $request->idx)
					->orderBy('idx','asc')
					->get()->count();

		$board_next_infom = array();
		if($board_next_infom_cnt > 0) {

			$board_next_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '>', $request->idx)
						->orderBy('idx','asc')
						->first();

			$board_next_infom_idx = $board_next_infom->idx;
			$board_next_infom_board_type = $board_next_infom->board_type;
		

		} else {
			$board_next_infom_idx = $request->idx;
			$board_next_infom_board_type = $request->board_type;
		}

		$return_list["board_next_infom_idx"] = $board_next_infom_idx;
		$return_list["board_next_infom_board_type"] = $board_next_infom_board_type;
		$return_list["board_next_inform"] = $board_next_infom;

		
			$board_prev_infom_cnt = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->get()->count();		

		$board_prev_infom = array();
		if($board_prev_infom_cnt > 0) {
		
			$board_prev_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->first();

			$board_prev_infom_idx = $board_prev_infom->idx;
			$board_prev_infom_board_type = $board_prev_infom->board_type;

		} else {
			$board_prev_infom_idx = $request->idx;
			$board_prev_infom_board_type = $request->board_type;
		}

		$return_list["board_prev_infom_idx"] = $board_prev_infom_idx;
		$return_list["board_prev_infom_board_type"] = $board_prev_infom_board_type;
		$return_list["board_prev_inform"] = $board_prev_infom;

		$comment_infom_cnt = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get()->count();

		$comment_infom = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get();

		$return_list["comment_data"] = $comment_infom;

		return view("board/faq_view", $return_list);		
	}

	public function noticeView(Request $request) {

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', $request->idx)
					->first();

		if($board_infom->secret_status == "Y") {
			
			echo "<script>alert('비밀글입니다.');location.href='/happy_call/board_passwd_check?idx=".$request->idx."&board_type=".$request->board_type."';</script>";
			exit;

		}

		$return_list["data"] = $board_infom;

		$file_cnt = 0;
		for($i=1;$i<=4;$i++) {

			if($i == 1) $number = "";
			else $number = $i;

			$attach_file = "attach_file".$number;

			if($board_infom->$attach_file) $file_cnt = $file_cnt + 1;

		}

		$return_list["file_cnt"] = $file_cnt;

		$board_next_infom_cnt = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', '>', $request->idx)
					->orderBy('idx','asc')
					->get()->count();
		
		$board_next_infom = array();
		if($board_next_infom_cnt > 0) {

			$board_next_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '>', $request->idx)
						->orderBy('idx','asc')
						->first();

			$board_next_infom_idx = $board_next_infom->idx;
			$board_next_infom_board_type = $board_next_infom->board_type;
		

		} else {
			$board_next_infom_idx = $request->idx;
			$board_next_infom_board_type = $request->board_type;
		}

		$return_list["board_next_infom_idx"] = $board_next_infom_idx;
		$return_list["board_next_infom_board_type"] = $board_next_infom_board_type;
		$return_list["board_next_inform"] = $board_next_infom;

		
			$board_prev_infom_cnt = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->get()->count();		

		$board_prev_infom = array();
		if($board_prev_infom_cnt > 0) {
		
			$board_prev_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->first();

			$board_prev_infom_idx = $board_prev_infom->idx;
			$board_prev_infom_board_type = $board_prev_infom->board_type;

		} else {
			$board_prev_infom_idx = $request->idx;
			$board_prev_infom_board_type = $request->board_type;
		}

		$return_list["board_prev_infom_idx"] = $board_prev_infom_idx;
		$return_list["board_prev_infom_board_type"] = $board_prev_infom_board_type;
		$return_list["board_prev_inform"] = $board_prev_infom;

		$comment_infom_cnt = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get()->count();

		$comment_infom = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get();

		$return_list["comment_data"] = $comment_infom;

		return view("board/notice_view", $return_list);		
	}

	public function happyCallView(Request $request) {

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', $request->idx)
					->first();

		if($board_infom->secret_status == "Y") {
			
			echo "<script>alert('비밀글입니다.');location.href='/happy_call/board_passwd_check?idx=".$request->idx."&board_type=".$request->board_type."';</script>";
			exit;

		}

		$return_list["data"] = $board_infom;

		$board_next_infom_cnt = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', '>', $request->idx)
					->orderBy('idx','asc')
					->get()->count();
		
		$board_next_infom = array();
		if($board_next_infom_cnt > 0) {

			$board_next_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '>', $request->idx)
						->orderBy('idx','asc')
						->first();

			$board_next_infom_idx = $board_next_infom->idx;
			$board_next_infom_board_type = $board_next_infom->board_type;
		

		} else {
			$board_next_infom_idx = $request->idx;
			$board_next_infom_board_type = $request->board_type;
		}

		$return_list["board_next_infom_idx"] = $board_next_infom_idx;
		$return_list["board_next_infom_board_type"] = $board_next_infom_board_type;
		$return_list["board_next_inform"] = $board_next_infom;

		
			$board_prev_infom_cnt = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->get()->count();		

		$board_prev_infom = array();
		if($board_prev_infom_cnt > 0) {
		
			$board_prev_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->first();

			$board_prev_infom_idx = $board_prev_infom->idx;
			$board_prev_infom_board_type = $board_prev_infom->board_type;

		} else {
			$board_prev_infom_idx = $request->idx;
			$board_prev_infom_board_type = $request->board_type;
		}

		$return_list["board_prev_infom_idx"] = $board_prev_infom_idx;
		$return_list["board_prev_infom_board_type"] = $board_prev_infom_board_type;
		$return_list["board_prev_inform"] = $board_prev_infom;

		$comment_infom_cnt = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get()->count();

		$comment_infom = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get();

		$return_list["comment_data"] = $comment_infom;

		return view("board_view", $return_list);		
	}

	public function passwordCheckAction(Request $request) {

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', $request->idx)
					->first();

		$comment_infom_cnt = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get()->count();

		$comment_infom = DB::table('comment') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('board_idx', $request->idx)
					->get();

		$board_next_infom_cnt = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $request->board_type)
					->where('idx', '>', $request->idx)
					->orderBy('idx','asc')
					->get()->count();
		
		$board_next_infom = array();
		if($board_next_infom_cnt > 0) {

			$board_next_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '>', $request->idx)
						->orderBy('idx','asc')
						->first();

			$board_next_infom_idx = $board_next_infom->idx;
			$board_next_infom_board_type = $board_next_infom->board_type;
		

		} else {
			$board_next_infom_idx = $request->idx;
			$board_next_infom_board_type = $request->board_type;
		}

		$return_list["board_next_infom_idx"] = $board_next_infom_idx;
		$return_list["board_next_infom_board_type"] = $board_next_infom_board_type;

			$board_prev_infom_cnt = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->get()->count();		

		$board_prev_infom = array();
		if($board_prev_infom_cnt > 0) {
		
			$board_prev_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', $request->board_type)
						->where('idx', '<', $request->idx)
						->orderBy('idx','desc')
						->first();

			$board_prev_infom_idx = $board_prev_infom->idx;
			$board_prev_infom_board_type = $board_prev_infom->board_type;

		} else {
			$board_prev_infom_idx = $request->idx;
			$board_prev_infom_board_type = $request->board_type;
		}

		$return_list["board_prev_infom_idx"] = $board_prev_infom_idx;
		$return_list["board_prev_infom_board_type"] = $board_prev_infom_board_type;

		$return_list["comment_data"] = $comment_infom;

		if (Hash::check($request->passwd, $board_infom->secret_number)) {
			$return_list["data"] = $board_infom;
			return view("board_view", $return_list);
		} else {
			echo "<script>alert('비밀번호가 다릅니다.');history.go(-1);</script>";
			exit;
		}

	}

	public function faq_control(Request $request) {
		DB::table('board')->where('idx', $request->idx)->delete();
		return true;
	}

	public function notice_control(Request $request) {
		DB::table('board')->where('idx', $request->idx)->delete();
		return true;
	}

	public function ey_notice(Request $request) {

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('board_type', request()->segment(1));
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });


		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', request()->segment(1));
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number =$totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', request()->segment(1))
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', request()->segment(1))
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter") {
			return view("board/ey_notice", $return_list);
		} else if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_data_room", $return_list);
		}


	}

	public function happyCall(Request $request) {

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery = $totalQuery->where('board_type', 'happy_call');

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query = $query->where('board_type', 'happy_call');
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number =$totalCount-($paging_option["pageSize"]*($thisPage-1));

		$return_list = array();
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view("board/happycall", $return_list);

	}

	public function faq_action(Request $request) {
		
		if($request->secretCheck && $request->secretNumber) {
			$secretStatus = "Y";
			$secretNumber = Bcrypt($request->secretNumber);
		} else {
			$secretStatus = "N";
			$secretNumber = "";
		}

		$board_cnt = DB::table('board')
					->where('board_type', $request->board_type)->get()->count();

		$answer_infom = DB::table('board') 
					->select(DB::raw('board.grp + 1 as grp_now, board.prino + 1 as prino_now'))
					->where('board_type', $request->board_type)
					->orderBy('idx', 'desc')
					->first();

		if($board_cnt <= 0) {
			$prino_now = 1;
			$grp_now = 1;
		} else {
			$prino_now = $answer_infom->prino_now;
			$grp_now = $answer_infom->grp_now;
		}
		
		if($request->writer_file) {
			$file = $request->writer_file->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		if($request->write_type == "modify") {

			DB::table('board')->where('idx', $request->board_idx)->update(
				[
					'subject' => $request->subject,
					'contents' => $request->contents,
					'category' => $request->category,
					'writer' => $request->writer,
					'ip_addr' => request()->ip(),
					'board_type' => $request->board_type,
					'parno' => 0,
					'prino' => $prino_now,
					'depth' => 1,
					'grp' => $grp_now,
				]
			);

			echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
			exit;

		} else {

			DB::table('board')->insert(
				[
					'subject' => $request->subject,
					'contents' => $request->contents,
					'category' => $request->category,
					'writer' => $request->writer,
					'ip_addr' => request()->ip(),
					'board_type' => $request->board_type,
					'parno' => 0,
					'prino' => $prino_now,
					'depth' => 1,
					'grp' => $grp_now,
					'reg_date' => \Carbon\Carbon::now(),
				]
			);

			echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
			exit;

		}



	}

	public function notice_action(Request $request) {
		
		if($request->secretCheck && $request->secretNumber) {
			$secretStatus = "Y";
			$secretNumber = Bcrypt($request->secretNumber);
		} else {
			$secretStatus = "N";
			$secretNumber = "";
		}

		$board_cnt = DB::table('board')
					->where('board_type', $request->board_type)->get()->count();

		$answer_infom = DB::table('board') 
					->select(DB::raw('board.grp + 1 as grp_now, board.prino + 1 as prino_now'))
					->where('board_type', $request->board_type)
					->orderBy('idx', 'desc')
					->first();

		if($board_cnt <= 0) {
			$prino_now = 1;
			$grp_now = 1;
		} else {
			$prino_now = $answer_infom->prino_now;
			$grp_now = $answer_infom->grp_now;
		}
		
		if($request->writer_file) {
			$file = $request->writer_file->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		if($request->category == 4 || request()->segment(1) == 'ey_law_data_room' || request()->segment(1) == 'ey_security_data_room') {

			if($request->writer_file_hwp) {
				$file = $request->writer_file_hwp->store('images');
				$file_array2 = explode("/", $file);
				copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
				$file_array2[1] = ", attach_file2 = '".$file_array2[1]."'";
			} else {
				$file_array2[1] = "";
			}

			if($request->writer_file_doc) {
				$file = $request->writer_file_doc->store('images');
				$file_array3 = explode("/", $file);
				copy("../storage/app/images/".$file_array3[1], "./storage/app/images/".$file_array3[1]);
				$file_array3[1] = ", attach_file3 = '".$file_array3[1]."'";
			} else {
				$file_array3[1] = "";
			}

			if($request->writer_file_pdf) {
				$file = $request->writer_file_pdf->store('images');
				$file_array4 = explode("/", $file);
				copy("../storage/app/images/".$file_array4[1], "./storage/app/images/".$file_array4[1]);
				$file_array4[1] = ", attach_file4 = '".$file_array4[1]."'";
			} else {
				$file_array4[1] = "";
			}

			if($request->write_type == "modify") {

				DB::update('update board set subject = "'.$request->subject.'", contents = "'.$request->contents.'", category = "'.$request->category.'", ip_addr = "'.request()->ip().'", board_type = "'.$request->board_type.'", top_type = "'.$request->top_type.'", parno = "'.$prino_now.'", prino = "'.$prino_now.'", depth = "1", grp = "'.$grp_now.'"'.$file_array2[1].$file_array3[1].$file_array4[1].' where idx = "'.$request->board_idx.'"');

				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
				exit;

			} else {

				DB::insert('insert into board set subject = "'.$request->subject.'", contents = "'.$request->contents.'", category = "'.$request->category.'", ip_addr = "'.request()->ip().'", board_type = "'.$request->board_type.'", top_type = "'.$request->top_type.'", parno = "'.$prino_now.'", prino = "'.$prino_now.'", depth = "1", grp = "'.$grp_now.'"'.$file_array2[1].$file_array3[1].$file_array4[1]);

				/*
				DB::table('board')->insert(
					[
						'subject' => $request->subject,
						'contents' => $request->contents,
						'category' => $request->category,
						'writer' => $request->writer,
						'ip_addr' => request()->ip(),
						'board_type' => $request->board_type,
						'top_type' => $request->top_type,
						'attach_file' => $file_array[1],
						'parno' => 0,
						'prino' => $prino_now,
						'depth' => 1,
						'grp' => $grp_now,
						'reg_date' => \Carbon\Carbon::now(),
					]
				);
				*/

				echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
				exit;

			}

		} else {

			if($request->write_type == "modify") {

				if($file_array[1] == null) {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'contents' => $request->contents,
							'category' => $request->category,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'top_type' => $request->top_type,
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
						]
					);

				} else {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'contents' => $request->contents,
							'category' => $request->category,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'top_type' => $request->top_type,
							'attach_file' => $file_array[1],
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
						]
					);

				}

				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
				exit;

			} else {

				DB::table('board')->insert(
					[
						'subject' => $request->subject,
						'contents' => $request->contents,
						'category' => $request->category,
						'writer' => $request->writer,
						'ip_addr' => request()->ip(),
						'board_type' => $request->board_type,
						'top_type' => $request->top_type,
						'attach_file' => $file_array[1],
						'parno' => 0,
						'prino' => $prino_now,
						'depth' => 1,
						'grp' => $grp_now,
						'reg_date' => \Carbon\Carbon::now(),
					]
				);

				echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
				exit;

			}
		}

	}

	public function happy_call_action(Request $request) {
		
		if($request->secretCheck && $request->secretNumber) {
			$secretStatus = "Y";
			$secretNumber = Bcrypt($request->secretNumber);
		} else {
			$secretStatus = "N";
			$secretNumber = "";
		}

		$board_cnt = DB::table('board')
					->where('board_type', $request->board_type)->get()->count();

		$answer_infom = DB::table('board') 
					->select(DB::raw('board.grp + 1 as grp_now, board.prino + 1 as prino_now'))
					->where('board_type', $request->board_type)
					->orderBy('idx', 'desc')
					->first();

		if($board_cnt <= 0) {
			$prino_now = 1;
			$grp_now = 1;
		} else {
			$prino_now = $answer_infom->prino_now;
			$grp_now = $answer_infom->grp_now;
		}

		//if(!$answer_infom->prino_now) $answer_infom->prino_now = 1;
		//if(!$answer_infom->grp_now) $answer_infom->grp_now = 1;		

		DB::table('board')->insert(
			[
				'subject' => $request->subject,
				'contents' => $request->contents,
				'category' => $request->category,
				'writer' => $request->writer,
				'ip_addr' => request()->ip(),
				'secret_status' => $secretStatus,
				'secret_number' => $secretNumber,
				'board_type' => $request->board_type,
				'attach_file' => $request->file_value,
				'parno' => 0,
				'prino' => $prino_now,
				'depth' => 1,
				'grp' => $grp_now,
				'reg_date' => \Carbon\Carbon::now(),
			]
		);

		echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
		exit;

	}

	public function image_upload_action(Request $request) {

		$file = $request->write_file->store('images');
		$file_array = explode("/", $file);
		copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		return $file_array[1];	

	}

	public function image_delete_action(Request $request) {

		//$request->deleteimage->delete('images');
		//File::delete($request->deleteimage);
		$return = unlink("../storage/app/images/".$request->deleteimage);
		//$return = Storage::delete("/app/images/".$request->deleteimage);
		return $return;	

	}

}

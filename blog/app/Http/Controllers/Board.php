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

	public function file_upload(Request $request) {

		if($request->upfiles) {
			$file = $request->upfiles->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./sample/editor/html/popular/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		$response = new \StdClass;
		//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
		$response->link = "/sample/editor/html/popular/" . $file_array[1];
		echo stripslashes(json_encode($response));

		/*
		$orgin_name = "";
		$save_name = "";
		if($_FILES['upfiles']['name'] != "") {

			$file = $_FILES['upfiles'];
			$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/sample/editor/html/popular/';
			$ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx,mp4,wmv,webw,ogg,avi";
			$allowed_extensions = explode(',', $ext_str);

			$max_file_size = 5242880000000000;
			$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

			// 확장자 체크
			if(!in_array($ext, $allowed_extensions)) {
				echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
				exit;
			}

			// 파일 크기 체크
			if($file['size'] >= $max_file_size) {
				echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
				exit;
			}

			$path = md5(microtime()) . '.' . $ext;
			if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
				

				//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
				$file_id = md5(uniqid(rand(), true));
				$name_orig = $file['name'];
				$name_save = $path;

				//$data['link'] = "http://designwizc.com/sample/editor/html/popular/ce71c16d59422aa4f5f2eb42d02ec6cc.jpg";

				//echo json_encode($data['link']);

				$response = new \StdClass;
				//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
				$response->link = "/sample/editor/html/popular/" . $name_save;
				echo stripslashes(json_encode($response));

				//$orgin_name = $orgin_name.$name_orig."^|^";
				//$save_name = $save_name.$name_save."^|^";

				//echo"<h3>파일 업로드 성공</h3>";
				//echo '<a href="file_list.php">업로드 파일 목록</a>';

			}


			//$i = $i + 1;
		} else {

			echo "<script>alert('파일이 업로드 되지 않았습니다. 증상이 반복될시 관리자에게 문의해주세요.');history.go(-1);</script>";
			exit;
			//echo '<a href="javascript:history.go(-1);">이전 페이지</a>';

		}

		//$file_origin_array =  substr($orgin_name, 0, -3);
		//$file_real_array = substr($save_name, 0, -3);
		*/
	}

	public function ey_write_faq(Request $request) {
		return view("board/ey_write_faq");
	}   

	public function ey_write_notice(Request $request) {
		
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_write_data_room");
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter" || request()->segment(1) == "happy_call" || request()->segment(1) == "ey_pcslider" || request()->segment(1) == "ey_pcpopup") {
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

		if(request()->segment(1) == "ey_pcpopup") {

			$board_infom = DB::table('poplayer') 
						->select(DB::raw('*'))
						->where('idx', $request->board_idx)
						->first();

		} else {
		
			$board_infom = DB::table('board') 
						->select(DB::raw('*'))
						->where('board_type', request()->segment(1))
						->where('idx', $request->board_idx)
						->first();
		
		}

		$return_list['data'] = $board_infom;
		
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_modify_data_room", $return_list);
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter" || request()->segment(1) == "happy_call" || request()->segment(1) == "ey_pcslider" || request()->segment(1) == "ey_pcpopup") {
			return view("board/ey_modify_notice", $return_list);
		}

	}

	public function ey_reply(Request $request) {

		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', request()->segment(1))
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;
		
		if(request()->segment(1) == "ey_data_room" || request()->segment(1) == "ey_law_data_room" || request()->segment(1) == "ey_security_data_room") {
			return view("board/ey_modify_data_room", $return_list);
		} else if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter" || request()->segment(1) == "happy_call") {
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

		if(request()->segment(1) == "ey_pcpopup") {
			$table = "poplayer";
		} else {
			$table = "board";
		}

		DB::table($table)->where('idx', $request->idx)->delete();
		return true;
	}

	public function ey_notice(Request $request) {

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		if(request()->segment(1) == 'ey_pcpopup') {
			$table = "poplayer";
		} else {
			$table = "board";
		}

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table($table);
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		if(request()->segment(1) != "ey_pcpopup") {
			$totalQuery->where('board_type', request()->segment(1));
			$totalQuery->where(function($query_set) {
					$query_set->where('top_type', '<>', 'Y')
					->orWhere('top_type', null);
			});
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table($table)
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		if(request()->segment(1) != "ey_pcpopup") {
			$query->where('board_type', request()->segment(1));
			$query->where(function($query_set2) {
					$query_set2->where('top_type', '<>', 'Y')
					->orWhere('top_type', null);
			});
		}
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		if(request()->segment(1) != "ey_pcpopup") {
			$query->orderByRaw('grp desc, depth asc');
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number =$totalCount-($paging_option["pageSize"]*($thisPage-1));
		
		$board_top_count = "";
		$board_top_list = "";
		if(request()->segment(1) != "ey_pcpopup") {
			$board_top_count = DB::table($table) 
						->select(DB::raw('*'))
						->where('board_type', request()->segment(1))
						->where('top_type', 'Y')
						->get()->count();

			$board_top_list = DB::table($table) 
						->select(DB::raw('*'))
						->where('board_type', request()->segment(1))
						->where('top_type', 'Y')
						->get();
		}

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

		if(request()->segment(1) == "ey_notice" || request()->segment(1) == "ey_newsletter" || request()->segment(1) == "happy_call") {
			return view("board/ey_notice", $return_list);
		} else if(request()->segment(1) == "ey_pcslider" || request()->segment(1) == "ey_pcpopup") {
			return view("board/ey_pcslider", $return_list);		
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
		
		$query = DB::table('board');
				//->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', 'happy_call');
		
		$query->orderByRaw('grp desc, depth asc');

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
					->where('board_type', $request->board_type)
					//->where('idx', $request->board_idx)
					->get()
					->count();

		$answer_infom = DB::table('board') 
					->select(DB::raw('*, board.grp as grp_now, board.prino as prino_now, board.parno as parno_now'))
					//->where('board_type', $request->board_type)
					->orderBy('idx', 'desc')
					->first();

		$reply_answer_infom = DB::table('board') 
					->select(DB::raw('depth, grp, prino, parno'))
					//->where('board_type', $request->board_type)
					->where('idx', $request->board_idx)
					->first();

		if($board_cnt <= 0) {
			$parno_now = 0;
			$prino_now = 0;
			$depth_now = 1;
			$grp_now = 1;
		} else {
			$parno_now = $request->board_idx;
			$prino_now = $answer_infom->prino_now + 1;
			$depth_now = $answer_infom->depth;
			$grp_now = $answer_infom->grp_now + 1;
		}
		
		if($request->write_type == "reply") {
			$parno_now = $request->board_idx;
			$prino_now = $reply_answer_infom->prino + 1;
			$depth_now = $reply_answer_infom->depth + 1;
			$grp_now = $reply_answer_infom->grp;			
		}

		if($request->writer_file) {
			$file = $request->writer_file->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		if($request->category == 4 || request()->segment(1) == 'ey_law_data_room' || request()->segment(1) == 'ey_security_data_room' || request()->segment(1) == 'ey_pcslider' || request()->segment(1) == 'ey_pcpopup') {

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

			if(request()->segment(1) == "ey_pcslider") {
				
				$period_query = "";
				if($file_array[1] != null) {
					$period_query = ", attach_file = '".$file_array[1]."'";
				}

				$period_query .= ", start_period = '".$request->start_period."', end_period = '".$request->end_period."', use_status = '".$request->use_status."', priority = '".$request->priority."'";
				
			} else {

				$period_query = "";

				if($file_array[1] != null) {
					$period_query = ", img = '".$file_array[1]."'";
				}				

			}

			if($request->write_type == "modify") {

				if(request()->segment(1) == 'ey_pcpopup') {

					DB::insert('update poplayer set title = "'.$request->subject.'", i_width = "'.$request->i_width.'", i_height = "'.$request->i_height.'", m_width = "'.$request->m_width.'", m_height = "'.$request->m_height.'", see = "'.$request->use_status.'", pop_position = "'.$request->pop_position.'", wdate = now(), wdatetime = now()'.$file_array2[1].$file_array3[1].$file_array4[1].$period_query." where idx = '".$request->board_idx."'");

				} else {

					DB::update('update board set subject = "'.$request->subject.'", contents = "'.$request->contents.'", category = "'.$request->category.'", ip_addr = "'.request()->ip().'", board_type = "'.$request->board_type.'", top_type = "'.$request->top_type.'", prino = "'.$prino_now.'", depth = "1", grp = "'.$grp_now.'"'.$file_array2[1].$file_array3[1].$file_array4[1].$period_query.' where idx = "'.$request->board_idx.'" where idx = "'.$request->board_idx.'"');

				}

				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
				exit;

			} else {

				if(request()->segment(1) == 'ey_pcpopup') {

					DB::insert('insert into poplayer set title = "'.$request->subject.'", i_width = "'.$request->i_width.'", i_height = "'.$request->i_height.'", m_width = "'.$request->m_width.'", m_height = "'.$request->m_height.'", see = "'.$request->use_status.'", pop_position = "'.$request->pop_position.'", wdate = now(), wdatetime = now()'.$file_array2[1].$file_array3[1].$file_array4[1].$period_query);

				} else {

					DB::insert('insert into board set subject = "'.$request->subject.'", contents = "'.$request->contents.'", category = "'.$request->category.'", ip_addr = "'.request()->ip().'", board_type = "'.$request->board_type.'", top_type = "'.$request->top_type.'", parno = "0", prino = "'.$prino_now.'", depth = "1", grp = "'.$grp_now.'", reg_date = now()'.$file_array2[1].$file_array3[1].$file_array4[1].$period_query);
				
				}
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
				
				if($request->board_type == "happy_call") {
					echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/".$request->board_type."/happy_call_list';</script>";
					exit;
				} else {
					echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
					exit;
				}

			} else {

				if($request->write_type != 'reply') {

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
							'parno' => $parno_now,
							'depth' => $depth_now,
							'prino' => $prino_now,
							'grp' => $grp_now,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				}

				if($request->board_type == "happy_call") {
					echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/".$request->board_type."/happy_call_list';</script>";
					exit;
				} else {
					echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/".$request->board_type."';</script>";
					exit;
				}

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

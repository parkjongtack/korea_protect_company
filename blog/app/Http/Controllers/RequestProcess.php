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
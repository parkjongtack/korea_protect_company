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

class EyAdmin extends Controller
{
    
	public function ey_write_notice(Request $request) {
		return view("ey_write_notice");
	}

	public function ey_login(){
        return view('ey_login');
    }

	public function ey_login_action(Request $request) {

		$member_infom_count = DB::table('admin_member') 
				->select(DB::raw('*'))
				->where('user_id', $request->id)
				->get()->count();		
		
		if($member_infom_count > 0) {

			$member_infom = DB::table('admin_member') 
					->select(DB::raw('*'))
					->where('user_id', $request->id)
					->first();

			if (Hash::check($request->pw, $member_infom->passwd)) {

				session(['user_id' => $request->id]);

				echo "<script>alert('로그인되었습니다.');location.href='/ey_pcslider';</script>";
			} else {
				echo "<script>alert('비밀번호가 잘못되었습니다.');location.href='/ey_login';</script>";
			}

		} else {
			echo "<script>alert('등록되어 있지 않은 아이디입니다.');location.href='/ey_login';</script>";
		}
	}

	public function ey_logout_action(Request $request) {
		$request->session()->flush();
		echo "<script>alert('로그아웃 되었습니다.');location.href='/ey_login';</script>";
	}

}

?>
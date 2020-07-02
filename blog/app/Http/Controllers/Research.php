<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class Research extends Controller
{
    
	public function research_action(Request $request) {
		
		DB::table('research')->insert(
			[
				'select_type' => $request->ResearchSelect,
				'ip_address' => request()->ip(),
				'reg_date' => \Carbon\Carbon::now(),
				'page_type' => $request->ResearchType,
			]
		);
		
		if($request->ResearchType == "index") {
			$location = "location.href = '/';";
		} else {
			$location = "location.href = '/".$request->ResearchType."';";
		}

		echo "<script>alert('설문조사가 완료되었습니다.');".$location."</script>";
		exit;

	}

}

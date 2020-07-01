<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class Board extends Controller
{
    
	public function happyCall(Request $request) {
		
		DB::table('research')->insert(
			[
				'select_type' => $request->ResearchSelect,
				'ip_address' => request()->ip(),
				'reg_date' => \Carbon\Carbon::now(),
			]
		);
		
		if($request->ResearchType == "index") {
			$location = "location.href = '/';";
		}

		return view("board/happycall");

	}

	public function happy_call_action(Request $request) {
		
	}

	public function image_upload_action(Request $request) {

		$file = $request->write_file->store('images');
		$file_array = explode("/", $file);
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

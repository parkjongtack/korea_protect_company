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

}

?>
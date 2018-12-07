<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Model\Login;

class LoginController extends Controller
{

	public function login(Request $request)
	{
		if($request->isMethod('post'))
		{
	        //echo md5('123abc');die;
			$data=$request->all();
			//var_dump($data);die;
			$model=Login::matchinguser($data);
	        //var_dump($model);die;
			if($model){
	            // echo "登录成功";
				return redirect('/one/infiniteindex');
	             
			}else{
				return redirect('/one/loginindex');
			}
		}else{
			return redirect('/one/loginindex');
		}
	}
    
}














?>
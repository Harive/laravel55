<?php
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;
	use App\Model\Register;
	use Session;
	use Mail;

	class RegisterController extends Controller{
		/**
		 * 注册
		 * post
		 */
		public function index(){
			if(request()->isMethod('get')){
				//视图页面
				return view('one/registerindex');
			}
			elseif(request()->isMethod('post')){
				//获取所有数据
				$data=request()->all();
				//var_dump($data);
				$res=Register::register($data);
				var_dump($res);
				if($res['status']==1){
					Mail::raw($res['msg'],function($message){
						$message->from('15210788690@163.com','网易网');
						$message->subject('注册结果');
						$message->to(Session::get('email'));
					});
					return redirect('/one/loginindex');
				}
			}
		}

	}
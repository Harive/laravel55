<?php
	namespace App\Model;

	use Illuminate\Database\Eloquent\Model;
	use App\Http\Requests\Request;
	use Illuminate\Support\Facades\DB;
	use Session;

	class Register extends Model{
		//注册方法判断
		public static function register($res){
			//判断手机号是否为空
			if(empty($res['telphone'])){
				$array['status']=3;
				$array['msg']='手机号不能为空';
			}
			//判断密码是否为空
			if(empty($res['password'])){
				$array['status']=4;
				$array['msg']='密码不能为空';
			}
			//邮箱不能为空
			if(empty($res['email'])){
				$array['status']=5;
				$array['msg']='邮箱不能为空';
			}
			//判断两次密码是否一致
			if($res['password']==$res['password2']){
				$res['password']=md5($res['password']);
				//删除字段
				unset($res['password2']);
				unset($res['_token']);
				$res['date']=date('Y-m-d H:i:s');
				Session::put('email',$res['email']);
				//入库
				$data=DB::table('register')->insert($res);
				if($data){
					$array['status']=1;
					$array['msg']='注册成功';
				}
				else{
					$array['status']=2;
					$array['msg']='注册失败';
				}
			}
			else{
				$array['status']=6;
				$array['msg']='两次密码不一致';
			}
			return $array;
		}
	}
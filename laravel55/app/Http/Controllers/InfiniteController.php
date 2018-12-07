<?php
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\DB;

	class InfiniteController extends Controller{
		/**
		 * 添加分类
		 * post
		 */
		public function insert(){
			if(request()->isMethod('get')){
				$data=DB::table('privileges')->get();
				//添加页面
				return view('one/infiniteinsert',['data'=>$data]);
			}
			elseif(request()->isMethod('post')){
				$data=request()->all();
				// var_dump($data);
				unset($data['_token']);
				$res['priv_name']='   |-'.$data['classfiy'];
				$res['p_id']=$data['p_id'];
				$res['priv_link']=$data['priv_link'];
				$info=DB::table('privileges')->insert($res);
				if($info){
					$array['status']=1;
					$array['msg']='添加成功';
				}
				else{
					$array['status']=2;
					$array['msg']='添加失败';
				}
				var_dump($array);
			}
		}
		/**
		 * 导航栏分类显示
		 */
	}
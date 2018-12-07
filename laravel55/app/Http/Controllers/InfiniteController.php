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
				// 删除_token字段
				unset($data['_token']);
				$info=DB::table('privileges')->insert($data);
				if($info){
					$array['status']=1;
					$array['msg']='添加成功';
					return redirect('/one/infiniteindex');
				}
				else{
					$array['status']=2;
					$array['msg']='添加失败';
					return redirect('/one/infiniteinsert');
				}
			}
		}
		/**
		 * 导航栏分类显示
		 * get
		 */
		public function index(){
			$data=DB::table('privileges')->get();
			//添加页面
			return view('one/infiniteindex',['data'=>$data]);
		}
		/**
		 * 导航栏信息详情
		 * get
		 */
		// public function list(){
		// 	$data=DB::table('privileges')->where('id',request()->)->get();
		// }
	}
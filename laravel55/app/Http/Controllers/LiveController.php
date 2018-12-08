<?php
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\DB;

	class LiveController extends Controller{
		/**
		 * 直播分类添加
		 * post
		 */
		public function insert(){
			if(request()->isMethod('get')){
				//查询表中数据
				$data=DB::table('live')->get();
				return view('/one/Liveinsert',['data'=>$data]);
			}
			elseif(request()->isMethod('post')){
				$data=request()->all();
				//var_dump($data);
				//消除_token
				unset($data['_token']);
				//入库
				$res=DB::table('live')->insert($data);
				if($res){
					//成功
					return redirect('/one/liveindex');
				}
				else{
					//失败
					return redirect('/one/liveinsert');
				}
			}
		}
		/**
		 * 直播分类查询
		 * get
		 */
		public function index(){
			//查询表中数据
			$data=DB::table('live')->get();
			//渲染到页面
			return view('/one/liveindex',['data'=>$data]);
		}
		/**
		 *直播信息详情
		 * get
		 */
		public function list(){
			//查询表中数据
			$data=DB::table('live')->where('id',request()->id)->get();
			//渲染到页面
			return view('/one/livelist',['data'=>$data]);
		}
		/**
		 * 直播信息修改
		 * get post
		 */
		public function update(){
			if(request()->isMethod('get')){
				// var_dump(request()->id);
				// 根据直播id查找数据
				$data=DB::table('live')->where('id',request()->id)->get();
				//查找live的全部数据
				$res=DB::table('live')->get();
				// var_dump($data);die;
				return view('one/liveupdate',['data'=>$data,'res'=>$res]);
			}
			elseif(request()->isMethod('post')){
				//获取页面数据
				$data=request()->all();
				// var_dump($data);die;
				unset($data['_token']);
				$res=DB::table('live')->where('id',request()->id)->update($data);
				if($res){
					//成功
					return redirect('/one/liveindex');
				}
				else{
					//失败
					return redirect('/one/liveupdate');
				}
			}
		}
		/**
		 * 删除直播信息
		 * get
		 */
		public function delete(){
			$ids=request()->id;
			$res=DB::table('live')->where('id',$ids)->delete();
			if($res){
				//成功
				return redirect('/one/liveindex');
			}
			else{
				//失败
				return redirect('/one/liveindex');
			}
		}
		/**
		 * 批量删除
		 * get
		 */
		public function delete2(){
			$ids=request()->id;
			// var_dump($ids);die;
			$str=explode(",",$ids);
			// var_dump($str);die;
			foreach($str as $v){
		        DB::table('live')->where('id',"=","$v")->delete();
		    }
		    return  redirect("/one/liveindex");
		}
		/**
		 * 搜索
		 * get
		 */
		public function search(){
			$se=request()->sear;
			// var_dump($se);
			// 根据直播分类名查询
			$data=DB::table('live')->where('live_name',$se)->get();
			// var_dump($data);die;
			return view('/one/livesearchindex',['data'=>$data]);
		}
	}
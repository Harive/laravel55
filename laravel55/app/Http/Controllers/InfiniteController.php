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
			$data=DB::table('privileges')->paginate(2);
			//添加页面
			return view('one/infiniteindex',['data'=>$data]);
		}
		/**
		 * 导航栏信息详情
		 * get
		 */
		public function list(){
			// var_dump(request()->id);
			// 根据导航id查找数据
			$data=DB::table('privileges')->where('id',request()->id)->get();
			// var_dump($data);die;
			return view('one/infinitelist',['data'=>$data]);
		}
		/**
		 * 修改导航栏信息
		 * post
		 */
		public function update(){
			if(request()->isMethod('get')){
				// var_dump(request()->id);
				// 根据导航id查找数据
				$data=DB::table('privileges')->where('id',request()->id)->get();
				//查找privileges的全部数据
				$res=DB::table('privileges')->get();
				// var_dump($data);die;
				return view('one/infiniteupdate',['data'=>$data,'res'=>$res]);
			}
			elseif(request()->isMethod('post')){
				//获取页面数据
				$data=request()->all();
				// var_dump($data);die;
				unset($data['_token']);
				$res=DB::table('privileges')->where('id',request()->id)->update($data);
				if($res){
					//成功
					return redirect('/one/infiniteindex');
				}
				else{
					//失败
					return redirect('/one/infiniteupdate');
				}
			}
		}
		/**
		 * 删除导航信息
		 * get
		 */
		public function delete(){
			$ids=request()->id;
			$res=DB::table('privileges')->where('id',$ids)->delete();
			if($res){
				//成功
				return redirect('/one/infiniteindex');
			}
			else{
				//失败
				return redirect('/one/infiniteindex');
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
		        DB::table('privileges')->where('id',"=","$v")->delete();
		    }
		    return  redirect("/one/infiniteindex");
		}
		/**
		 * 搜索
		 * get
		 */
		public function search(){
			$se=request()->sear;
			// var_dump($se);
			// 跟据导航分类名查询
			$data=DB::table('privileges')->where('priv_name',$se)->get();
			// var_dump($data);die;
			return view('/one/infinitesearchindex',['data'=>$data]);
		}
	}
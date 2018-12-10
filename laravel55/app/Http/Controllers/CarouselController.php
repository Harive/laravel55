<?php
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\DB;

	class CarouselController extends Controller{
		/**
		 * 添加轮播图信息
		 * post
		 */
		public function insert(){
			if(request()->isMethod('get')){
				return view('/one/carouselinsert');
			}
			elseif(request()->isMethod('post')){
				$data=request()->all();
				//var_dump($data);
				$file=request()->file('car_photo');
				if(request()->hasFile('car_photo')&&$file->isValid()){
	              	$ext=$file->getClientOriginalExtension();
	              	$oldName=$file->getClientOriginalName();
	              	$filesize=$file->getClientSize();
	              	// var_dump($ext);exit;
	              	$filename=uniqid().rand(100,999).'.'.$ext;
	              	$file->move('./upload',$filename);
	              	// var_dump($file);die;
	              	$data['car_photo']='/upload/'.$filename;
	              	// var_dump($data);exit;
		        }
		        unset($data['_token']);
		        $data['car_date']=date('Y-m-d H:i:s');
		        $res=DB::table('carousel')->insert($data);
		        if($res){
		        	//成功
		        	return redirect('/one/carouselindex');
		        }
		        else{
		        	//失败
		        	return redirect('/one/carouselinsert');
		        }
			}
		}
		/**
		 * 轮播图展示信息
		 * get
		 */
		public function index(){
			//获取表中轮播图状态是显示且根据排序正序输出
			$data=DB::table('carousel')->where('car_status',1)->orderby('car_sort','asc')->paginate(2);
			return view('/one/carouselindex',['data'=>$data]);
		}
		/**
		 *轮播图详细xinxi
		 * get
		 */
		public function list(){
			//获取表中轮播图状态是显示且根据排序正序输出
			$data=DB::table('carousel')->where(array('car_status'=>1,'id'=>request()->id))->orderby('car_sort','asc')->get();
			return view('/one/carousellist',['data'=>$data]);
		}
		/**
		 * 删除
		 * get
		 */
		public function delete(){
			$data=DB::table('carousel')->where('id',request()->id)->delete();
			if($data){
				//成功
				return redirect('/one/carouselindex');
			}
			else{
				//失败
				return redirect('/one/carouselindex');
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
		        DB::table('carousel')->where('id',"=","$v")->delete();
		    }
		    return  redirect("/one/carouselindex");
		}
		/**
		 * 修改
		 * get post
		 */
		public function update(){
			if(request()->isMethod('get')){
				// var_dump(request()->id);
				// 根据导航id查找数据
				$data=DB::table('carousel')->where('id',request()->id)->get();
				// var_dump($data);die;
				return view('one/carouselupdate',['data'=>$data]);
			}
			elseif(request()->isMethod('post')){
				//获取页面数据
				$data=request()->all();
				$file=request()->file('car_photo');
				if(request()->hasFile('car_photo')&&$file->isValid()){
	              	$ext=$file->getClientOriginalExtension();
	              	$oldName=$file->getClientOriginalName();
	              	$filesize=$file->getClientSize();
	              	// var_dump($ext);exit;
	              	$filename=uniqid().rand(100,999).'.'.$ext;
	              	$file->move('./upload',$filename);
	              	// var_dump($file);die;
	              	$data['car_photo']='/upload/'.$filename;
	              	// var_dump($data);exit;
		        }
				// var_dump($data);die;
				unset($data['_token']);
				$res=DB::table('carousel')->where('id',request()->id)->update($data);
				if($res){
					//成功
					return redirect('/one/carouselindex');
				}
				else{
					//失败
					return redirect('/one/carouselupdate');
				}
			}
		}
		/**
		 * 搜索
		 * get
		 */
		public function search(){
			$se=request()->sear;
			// var_dump($se);
			// 跟据导航分类名查询
			$data=DB::table('carousel')->where('id',$se)->get();
			// var_dump($data);die;
			return view('/one/carouselsearchindex',['data'=>$data]);
		}
	}
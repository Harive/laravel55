<?php
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\DB;

	class QrController extends Controller {
		/**
		 * 添加信息
		 * post
		 */
		public function insert(){
			if(request()->isMethod('get')){
				return view('/one/qrinsert');
			}
			elseif(request()->isMethod('post')){
				$data=request()->all();
				//var_dump($data);
				$file=request()->file('qr_photo');
				if(request()->hasFile('qr_photo')&&$file->isValid()){
	              	$ext=$file->getClientOriginalExtension();
	              	$oldName=$file->getClientOriginalName();
	              	$filesize=$file->getClientSize();
	              	// var_dump($ext);exit;
	              	$filename=uniqid().rand(100,999).'.'.$ext;
	              	$file->move('./qr',$filename);
	              	// var_dump($file);die;
	              	$data['qr_photo']='/qr/'.$filename;
	              	// var_dump($data);exit;
		        }
		        unset($data['_token']);
		        $data['qr_date']=date('Y-m-d H:i:s');
		        $res=DB::table('qr')->insert($data);
		        if($res){
		        	//成功
		        	return redirect('/one/qrindex');
		        }
		        else{
		        	//失败
		        	return redirect('/one/qrinsert');
		        }
			}
		}
		/**
		 * 显示
		 * get
		 */
		public function index(){
			$data=DB::table('qr')->paginate(2);
			return view('/one/qrindex',['data'=>$data]);
		}
		/**
		 * 显示详细信息
		 * get
		 */
		public function list(){
			$data=DB::table('qr')->where('id',request()->id)->get();
			return view('/one/qrlist',['data'=>$data]);
		}
		/**
		 * 修改
		 * get post
		 */
		public function update(){
			if(request()->isMethod('get')){
				// var_dump(request()->id);
				// 根据导航id查找数据
				$data=DB::table('qr')->where('id',request()->id)->get();
				// var_dump($data);die;
				return view('one/qrupdate',['data'=>$data]);
			}
			elseif(request()->isMethod('post')){
				//获取页面数据
				$data=request()->all();
				$file=request()->file('qr_photo');
				if(request()->hasFile('qr_photo')&&$file->isValid()){
	              	$ext=$file->getClientOriginalExtension();
	              	$oldName=$file->getClientOriginalName();
	              	$filesize=$file->getClientSize();
	              	// var_dump($ext);exit;
	              	$filename=uniqid().rand(100,999).'.'.$ext;
	              	$file->move('./qr',$filename);
	              	// var_dump($file);die;
	              	$data['qr_photo']='/qr/'.$filename;
	              	// var_dump($data);exit;
		        }
				// var_dump($data);die;
				unset($data['_token']);
				$res=DB::table('qr')->where('id',request()->id)->update($data);
				if($res){
					//成功
					return redirect('/one/qrindex');
				}
				else{
					//失败
					return redirect('/one/qrupdate');
				}
			}
		}
		/**
		 * 删除
		 * get
		 */
		public function delete(){
			$data=DB::table('qr')->where('id',request()->id)->delete();
			if($data){
				//成功
				return redirect('/one/qrindex');
			}
			else{
				//失败
				return redirect('/one/qrindex');
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
		        DB::table('qr')->where('id',"=","$v")->delete();
		    }
		    return  redirect("/one/qrindex");
		}
		/**
		 * 搜索
		 * get
		 */
		public function search(){
			$se=request()->sear;
			// var_dump($se);
			// 跟据导航分类名查询
			$data=DB::table('qr')->where('qr_info',$se)->get();
			// var_dump($data);die;
			return view('/one/qrsearchindex',['data'=>$data]);
		}
	}
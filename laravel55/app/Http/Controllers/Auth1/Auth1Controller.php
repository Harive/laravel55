<?php
namespace App\Http\Controllers\Auth1;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Model\Auth1;

use App\Model\RoleAuth;

class Auth1Controller extends Controller
{
	
	 /**
     * 读取所有的权限
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index(){ 
		$list =Auth1::read();
		//var_dump($list);die;
        return view('auth1/index',['a'=>$list]);

	}

	/**
	 * 添加权限
	 * @return [type] [description]
	 */
	public function insert()
	{
		if(request()->isMethod('post')){
              $data=request()->all();
              unset($data['_token']);
              $res=DB::table('jy_privileges')->insert($data);
              if($res){
                return redirect('auth1/index');
              }
              else{
                return redirect('auth1/insert');
              }
        }else{
           $data=Auth1::getRoleList();
           return view('auth1/insert',['data'=>$data]);

        }
	}

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteauth($id)
    {
    	 //var_dump($id);die;
         $list =  Auth1::deletes($id);
        if ($list){
            return redirect('auth1/index');
        }
    }
    
    /**
     * [edit description]
     * @param  Request $Request [description]
     * @return [type]           [description]
     */
	public function edit(Request $Request){
        //var_dump($id);die;
        if($Request->isMethod('post')){
            //var_dump($id);die;
            // echo "2324";die;
            $data = $Request->all();
           //dd($data);exit;

            unset($data['_token']);
         
           //var_dump($data);exit;
            //$data= $this->delToken($data); 
            
            $res=DB::table('jy_privileges')->where('id',$Request['id'])->update($data);
              if($res){
                return redirect('auth1/index');
            }else{
                
                return view('auth1/edit');
            }
        }elseif($Request->isMethod('get')){
            //var_dump($id);die;
            $brand=DB::table('jy_privileges')->where('id',$Request['id'])->first();
            // dd($brand);exit();
           return view('auth1/edit',['res'=>$brand]);
        } 
    }

   /**
    * 批量删除
    */
    
    public function checkdel(Request $request){
        $id=$request->post("id");
        // return $id;
        if(isset($id['_token'])){
            unset($id['_token']);
        }
        $id=explode(",",$id);
        $object=new Auth1();
        if($object->whereIn("id",$id)->delete()){
            return [
                "code"=>200,
                "data"=>"删除成功"
            ];
        }
    }
}






















?>
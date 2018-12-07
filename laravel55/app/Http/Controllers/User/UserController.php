<?php

namespace App\Http\Controllers\User;

use App\Model\UserModels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //显示数据
    public function index(){
        $model = new UserModels();
        $list = $model->indexs();
        return view('user/index',['list'=>$list]);
    }
    //跳转添加
    public function insertadd(){
        return view('user/insert');
    }
    //执行添加
    public function inserts(Request $request){
        $info = new UserModels();
        $res = $request->all();
//        print_r($res);die;
        $up =[
            'nickname' => $res['nickname'],
            'email' => $res['email'],
            'gender' => $res['gender'],
            'signature' => $res['signature'],
            'telphone' => $res['telphone'],
        ];
        $info->inserts($up);
        return redirect('user/index');
    }
    //删除
    public function deletes($id){
        $model = new UserModels();
        $list = $model->deletes($id);
        return redirect('user/index');
    }
    //批量删除
    public function admindeletes(){
        $str = request()->only('id');
        $data = $str['id'];
        //调用模型进行批量删除
        $model = new UserModels();
        $res=$model->delete($data);
        if ($res){
            return redirect('index');
        }
    }
    //跳转修改
    public function updateadd($id){
        $model = new UserModels();
        $assign['info'] = $model->updateadd($id);
        return view('user/update',$assign);
    }
    //执行修改
    public function updateas(Request $request){
        $model = new UserModels();
        $res = $request->all();
//        print_r($res);die;
        $data =[
            'nickname' => $res['nickname'],
            'email' => $res['email'],
            'gender' => $res['gender'],
            'signature' => $res['signature'],
            'telphone' => $res['telphone'],
        ];
        $id = $res['id'];
        $list = $model->updateadds($id,$data);
        return redirect('user/index');
    }
}

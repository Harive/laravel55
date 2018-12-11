<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModels extends Model
{
    //显示
    public function indexs(){
        $list = DB::table('user')->get();
        return $list;
    }
    //添加
    public function inserts($data){
        $list = DB::table('user')->insert($data);
        return $list;
    }
    //删除
    public function deletes($id){
        $list = DB::table('user')->delete($id);
        return $list;
    }
    //跳转修改
    public function updateadd($id){
        $res = DB::table('user')->where('id',$id)->first();
        return $res;
    }
    //执行修改
    public static function updateadds($id,$data)
    {
        $res = DB::table('user')->where('id',$id)->update($data);
        return $res;
    }
}

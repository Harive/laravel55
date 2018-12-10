<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Auth1 extends Model
{
    public  $table="jy_privileges";
    public static function addrule($array)
    {
        $info = DB::table('jy_privileges')->insert($array);
        if ($info){
            $data['status']='100';
            $data['msg']='权限添加成功';
        }else{
            $data['status']='101';
            $data['msg']='权限添加失败';
        }
        return $data;
    }
    public static function read()
    {
        $info = DB::table('jy_privileges')->get();
        return $info;
    }

    public static function deletes($id)
    {
        $res = DB::table('jy_privileges')->where('id',$id)->delete();
        return $res;
    }

    public static function getRoleList(){
        $res=DB::table('jy_roles')->get();
        return $res;
    }
}
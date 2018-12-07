<?php
namespace App\Model; 
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
   //获取信息匹配用户	
   public  static function matchinguser($data)
   {
   	   //var_dump($data);die;
   	   $password=md5($data['password']);
       $res = DB::table('register')->where(array('telphone'=>$data['telphone'],'password'=>$password))->first();
       // var_dump($res);die;
        return $res;
   }
}









?>
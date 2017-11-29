<?php
/**
 * Created by PhpStorm.
 * User: CHL
 * Date: 2017/11/28
 * Time: 22:09
 */

namespace app\admin\model;


use think\Model;

class AdminUser extends Model
{
    protected  $auto = ['ip','last_login_time'];

    /**
     * 设置ip
     * @return mixed
     */
    protected function setIpAttr()
    {
        return request()->ip();
    }

    protected function setLastLoginTimeAttr()
    {
        return time();
    }


    /**
     * 登录认证
     * @param $loginName 登录账号
     * @param $password 密码
     * @return array
     */
    public function loginAuth($loginName,$password)
    {
        $user = $this->where('login_name',$loginName)->find();
        if(empty($user)){
            return ['success'=>false,'msg'=>'用户名不存在'];
        }
        if(md5(md5($password)) == $user->password){
            //设置cookie
            cookie(config('cookie_user'),serialize($user));
            $user->save();
            return ['success'=>true,'msg'=>'认证成功'];
        }
         return ['success'=>false,'msg'=>'密码错误'];
    }
}
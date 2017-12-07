<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/27
 * Time: 11:53
 */

namespace app\index\controller;


use app\index\model\LeaveMsg;

class About extends Right
{
    protected $beforeActionList = [
        'setModule' => ['only'=>'index']
    ];

   public function index()
   {
       $model = new LeaveMsg();
       $page = input('page') ? input('page') : 1;
       $leaveMsg = $model->getLeaveMsgList($page);
       return view('about',['leaveMsg'=>$leaveMsg['rows'],'total'=>$leaveMsg['total']]);
   }

    /**
     * 保存留言
     * @return array
     */
    public function  leaveMsg(){
        $model = new LeaveMsg();
        $model->content = input('content');
        $ret = $model->save();
        if($ret === false){
            return ['success'=>false ,'msg'=>'很抱歉,服务器出问题了!'];
        }
        return ['success'=>true ,'msg'=>'留言提交成功'];
    }
}
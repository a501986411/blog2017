<?php
/**
 * Created by PhpStorm.
 * User: CHL
 * Date: 2017/12/28
 * Time: 22:21
 */
namespace app\index\controller;

use app\index\model\ArticleComments;
use app\index\model\LeaveMsg;
use think\Controller;
use think\Log;

class Comments extends Controller {

    /**
     * 畅言评论回调接口
     */
    public function saveComments()
    {
        $data = input('post.data');
        $data = json_decode(htmlspecialchars_decode($data),true);
        $sourceArr = explode('_',$data['sourceid']);
        $comment = $data['comments'][0];
        if($sourceArr[0] == 'article'){ //文章留言
            $articleData['article_id'] = $sourceArr[1];
            $articleData['pid'] = $comment['replyid'];
            $articleData['content'] =$comment['content'];
            $articleData['userId'] = $comment['user']['sohuPlusId'];
            $articleData['nickname'] = $comment['user']['nickname'];
            $articleData['usericon'] = $comment['user']['usericon'];
            $articleData['ip'] = $comment['ip'];
            $articleData['channeltype'] = $comment['channeltype'];
            $articleData['from'] =  $comment['from'];
            $articleData['spcount'] = $comment['spcount'];
            $articleData['opcount'] = $comment['opcount'];
            $articleData['ctime'] = $comment['ctime'];
            $articleData['cmtid'] = $comment['cmtid'];
            $model = new ArticleComments();
            $model->save($articleData);
            Log::info('保存评论:'.$model->getLastSql());
        }else{//其他留言
            $leaveMsg['pid'] = $comment['replyid'];
            $leaveMsg['content'] =$comment['content'];
            $leaveMsg['userId'] = $comment['user']['sohuPlusId'];
            $leaveMsg['nickname'] = $comment['user']['nickname'];
            $leaveMsg['usericon'] = $comment['user']['usericon'];
            $leaveMsg['ip'] = $comment['ip'];
            $leaveMsg['channeltype'] = $comment['channeltype'];
            $leaveMsg['from'] =  $comment['from'];
            $leaveMsg['spcount'] = $comment['spcount'];
            $leaveMsg['opcount'] = $comment['opcount'];
            $leaveMsg['ctime'] = $comment['ctime'];
            $leaveMsg['cmtid'] = $comment['cmtid'];
            $model = new LeaveMsg();
            $model->save($leaveMsg);
            Log::info('保存留言:'.$model->getLastSql());
        }

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/22
 * Time: 13:40
 */
namespace app\admin\controller;

use app\admin\model\Article;

class ArticleManage {

    /**
     * 显示文章列表
     * @return \think\response\View
     */
    public function index()
    {
        return view();
    }

    /**
     * 保存文章
     * @return false|int
     */
    public function save()
    {
        $model = new Article();
        $ret = $model->allowField(true)->isUpdate(input('post.id'))->save(input());
        return $ret;
    }

    /**
     * 图片保存
     * @return array
     */
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('editormd-image-file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                //成功
                echo json_encode(['url'=>APP_UPLOADS.$info->getSaveName(),'success'=>1]);
            }else{
                // 上传失败获取错误信息
                echo json_encode(['url'=>'','success'=>0,'message'=>$file->getError()]);
            }
        }
    }

    /**
     * 获取文章列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getArticleList()
    {
        $model = new Article();
        $result = $model->order('update_time','desc')
              ->select();
        return $result;
    }

    /**
     * 获取单个文件的信息
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getArticleInfo()
    {
        $articleId = input('get.articleId');
        if($articleId){
            $model = new Article();
            $result = $model->where('id',$articleId)
                ->find();
            return $result;
        }
        return [];
    }

}
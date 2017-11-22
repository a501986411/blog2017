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
        $model = new Article(input());
        $ret = $model->allowField(true)->save();
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
                echo json_encode(['url'=>APP_UPLOADS.DS.$info->getSaveName(),'success'=>1]);
            }else{
                // 上传失败获取错误信息
                echo json_encode(['url'=>'','success'=>0,'message'=>$file->getError()]);
            }
        }
    }
}
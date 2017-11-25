<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/22
 * Time: 15:55
 */
namespace app\index\model;

use think\Model;

class Article extends Model {

    protected  $hotArticleNum = 7; //热文推荐数量
    protected  $weberArticleNum = 7; //站长推荐文章数量


    /**
     * 获取文章列表
     * @param int $page
     * @param string $rows
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getArticleList($page=1,$rows='')
    {
        $rows = empty($rows) ? config('page_rows') : $rows;
        $list['rows'] = $this->where('status',1)
                    ->page($page,$rows)
                    ->order('is_top','desc')
                    ->order('create_time','desc')
                    ->select();
        $list['total'] = $this->where('status',1)->count();
        return $list;
    }
    /**
     * 获取热文推荐列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public  function getHotArticleList()
    {
        $result = $this->where('status',1)
            ->order('visit_num desc')
            ->limit($this->hotArticleNum)
            ->select();
        return $result;
    }

    /**
     * 获取站长推荐文章列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getBestArticleList()
    {
        $result = $this->where('status',1)
            ->order('create_time desc')
            ->limit($this->hotArticleNum)
            ->select();
        return $result;
    }
}
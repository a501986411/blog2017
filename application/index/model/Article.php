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
     * @param string $searchKey
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getArticleList($page=1,$rows='',$searchKey=array())
    {
        $rows = empty($rows) ? config('page_rows') : $rows;
        //获取total
        $this->where('status',1);
        if(isset($searchKey['tag'])){
            $this->where('tag','like','%'.$searchKey['tag'].'%');
        }
        $list['total'] = $this->count();

        //获取数据
        $this->where('status',1);
        if(isset($searchKey['tag'])){
            $this->where('tag','like','%'.$searchKey['tag'].'%');
        }
        $list['rows'] = $this->page($page,$rows)
                    ->order('is_top','desc')
                    ->order('create_time','desc')
                    ->select();

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
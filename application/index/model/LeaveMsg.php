<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/29
 * Time: 17:30
 */

namespace app\index\model;


use think\Model;

class LeaveMsg extends Model
{
    protected $createTime='create_time';

    /**
     * 获取留言列表
     * @param int $page
     * @param string $rows
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLeaveMsgList($page=1,$rows='')
    {
        $rows = empty($rows) ? config('page_rows') : $rows;
        $list['rows'] = $this->where('status',1)
            ->page($page,$rows)
            ->order('create_time','desc')
            ->select();
        $list['total'] = $this->where('status',1)->count();
        return $list;
    }
}
<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
/**
 *public function submit()     统一提交
 *#以下方法名对应表名称
 *public function news()      []
 *public function config()    []
 *public function content()   [] 映射->news表
 *public function news_cats() [] news_cats表(超级管理员用的)
 *public function pic()		  []
 *public function usr()		  []
 *public function education()		  []
 *public function certificate()		  []
 *public function nature()		  []
 */
class DeleteData
{

	protected $fields = [];
	protected $table = '';
	protected $isUpdate = 0;
	protected $isInsert = 0;
	protected $logInsert = '';// 插入数据时的日志
	protected $logUpdate = '';// 更新时的日志

	private $data = [];
	public $error = [];

	// 表映射
	private static $map = [
		'content' => 'news',
	];

	public function __construct($table, $id, $data)
	{
		if ( $id ) {
			$this->isUpdate = $id;
		} else {
			$this->isInsert = 1;
		}

		$this->data = $data;

		$this->table  = $table;
		$this->fields = $this->$table();
		isset(self::$map[$table]) && $this->table = self::$map[$table];

	}


   function deleteProperty($ids=0,$map=array()){//删除新闻及与他的子级
    $map['id']  = array('in',$ids);
    $path = trim(ROOT_PATH, DS) . Config::get('pic.upload');
    $data = M('property')->where($map)->select();
    M()->startTrans();
    if(M('property')->delete($ids)):
        foreach ($data as $key => $row) {
            AddLog("删除房源内容:".$row['title'],$_SESSION['Admin_UserName']);
            isset($row['img1']) ? @unlink($path.$row['img1']) : '';
            isset($row['doc1']) ? @unlink($path.$row['doc1']) : '';
            isset($row['doc2']) ? @unlink($path.$row['doc2']) : '';
            isset($row['doc3']) ? @unlink($path.$row['doc3']) : '';
            isset($row['doc4']) ? @unlink($path.$row['doc4']) : '';
            $ids2 = M('pic')->where(array('ti'=>array('in',$ids)))->getField('id',true);
            if($ids2){
                // $ids2 = array_merge_values($ids2);
                $ids2 = implode(',',$ids2);
                deletePics($ids2);
            }
    }
    M()->commit();
    return true;
    else:
        M()->rollback();
        return false;
    endif;

   }

   function deleteNewsCats($ids=0,$map=array()){//删除新闻及与他的子级
    $tree = new Tree(M('news_cats')->select());
    $pSet = $tree->getSon($ids);
    foreach ($pSet as $row) {
        $id = $row['id'];
        M('news_cats')->delete($id);
        $newsIds = M('news')->where("`pid`=$id OR `ty`=$id OR `tty`=$id")->getField('id',true);
        if ($newsIds) {
            $newsIds = implode(',',$newsIds);
            deleteNews($newsIds);
        }
    }
    return true;
   }

   function deleteOrders($ids,$map=array()){//删除订单及关联的log
    $map['id']  = array('in',$ids);
    $data = M('news')->where($map)->select();
    M()->startTrans();
    if(M('order')->delete($ids))://删除订单
        $map2['oid']  = array('in',$ids);
        if($data2 = M('log')->where($map2)->select()){
            foreach ($data2 as $key2 => $row2) {
                HR('log')->delete($row2['id']);//删除日志
            }
        }
        M()->commit();
        return true;
    else:
        M()->rollback();
        return false;
    endif;

   }


   function deleteUsers($ids,$map=array()){//删除用户  删除对应订单
    $map['id']  = array('in',$ids);
    $data = HR('user')->where($map)->select();
    M()->startTrans();
    if(M('user')->delete($ids))://删除用户
        $map2['uid']  = array('in',$ids);
        if($data2 = HR('order')->where($map2)->select()){
            foreach ($data2 as $key2 => $row2) {
                deleteOrders($row2['id']);//删除订单
            }
        }
        M()->commit();
        return true;
    else:
        M()->rollback();
        return false;
    endif;

   }

   function deleteUsrNeed($ids,$map=array()){//删除需求
    $map['id']  = array('in',$ids);
    $path = trim(ROOT_PATH, DS) . Config::get('pic.needImage');
    $data = M('usr_need')->where($map)->select();
    M()->startTrans();
    if(M('usr_need')->delete($ids)):
        foreach ($data as $row) {
            isset($row['img']) ? @unlink($path.$row['img']) : '';
        }
        M()->commit();
        return true;
    else:
        M()->rollback();
        return false;
    endif;

   }

   function deletePics($ids){//删除关联图片
    $map['id']  = array('in',$ids);
    $path = trim(ROOT_PATH, DS) . Config::get('pic.upload');
    $data = M('pic')->where($map)->select();
    M()->startTrans();
    if(M('pic')->delete($ids)):
        foreach ($data as $row) {
            isset($row['img1']) ? @unlink($path.$row['img1']) : '';
        }
        M()->commit();
        return true;
    else:
        M()->rollback();
        return false;
    endif;

   }

}

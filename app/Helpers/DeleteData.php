<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
/**
 *public function submit()     统一提交
 *#以下方法名对应表名称
 *public function certificate()		  []
 */
class DeleteData
{

	public function __construct($table, $ids, $user_id)
	{
        $ids_arr = explode(',' , $ids);
        switch ($table) {
            case 'resume':
                $foreign_id = 'business_id';
                break;
            default:
                $foreign_id = 'user_id';
                break;
        }
        $delStatus= DB::table($table)->where($foreign_id, $user_id)->whereIn('id' , $ids_arr)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        // $delStatus && \App\Log::create(['details' => "删除{$table}表数据:{$ids}", 'user_id' => $user_id]);
        // $data = HR($t)->where($map)->select();

         if ( $delStatus ) {
            $delStatus && \App\Log::create(['details' => "删除{$table}表数据:{$ids}", 'user_id' => $user_id]);
         }else{
            return false;
         }
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

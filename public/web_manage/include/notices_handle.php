<?php
require 'common.inc.php';
require 'chkuser.inc.php';

//所有的提交集中处理
/*array(5) {
  ["send"] => string(20) "certification_person"
  ["action"] => string(2) "ok"
  ["message"] => string(1) " "
  ["uid"] => string(2) "17"
  ["nid"] => string(2) "11"
}*/
$send = I('post.send','','trim');
$action = I('post.action','','trim');
$typeid = I('post.typeid','','trim');
$message = I('post.message','','trim');
$uid = I('post.uid','','intval');
$nid = I('post.nid','','intval');
//后台选择企业
switch ($send) {
    case 'certification':// 企业认证
        $userHasOneTable = 'businesses';
        certification($userHasOneTable);
        break;
    case 'certification_person':// 个人认证
        $userHasOneTable = 'persons';
        certification($userHasOneTable);
        break;
    case 'complaint':// 举报
        if($action == 'handled') {
          creatNotices($uid, $typeid, $nid, $message);
          if (readNotice($nid)) {
            exit('举报处理完毕:'.$message);
          }
        }
        exit('处理失败');
        break;
    default:
        # code...
        break;
}
exit('未识别的操作');


function certification($table)
{
    global $uid,$action,$typeid,$message,$nid;
    // config('templates.certification_person:ok')
    if ($action == 'ok') {
        // if(updateBusiness($user_id, ['certified_status' => 2])) {
        if(_update($table, $uid, ['certified_status' => 2], 'user_id')) {
          _update('users', $uid, ['certified' => 1]);
          creatNotices($uid, $typeid, 0, $message);
          readNotice($nid);
          exit('通过认证');
        }else {
          exit('通过失败');
        }
    } elseif($action == 'refuse') {
        if(_update($table, $uid, ['certified_status' => 3], 'user_id')) {
          creatNotices($uid, $typeid, 0, $message);
          readNotice($nid);
          exit("已驳回:$message");
        } else {
          exit('驳回失败');
        }
    }
    exit('操作失败:未识别的操作');
}

function readNotice($id)
{
  return _update('notices', $id, ['status' => 3]);
}

function creatNotices($user_id, $action_type_id, $source_id, $content = '', $title='')
{
    if ($action = M('action_types')->where("id=$action_type_id")->field('source_type,action')->find()) {
        if (empty($title)) {
            $title = config("templates.{$action['source_type']}:{$action['action']}");
        }
    }
    return M('notices')->insert([
        'user_id'        => $user_id,
        'sender_id'      => 0,
        'action_type_id' => $action_type_id,
        'source_id'      => $source_id,
        'status'         => 1,
        'title'          => $title,
        'content'        => $content,
        'created_at'     => date('Y-m-d H:i:s'),
    ]);
}

function _update($table, $id, $arr, $pk = 'id')
{
    $arr['updated_at'] = date('Y-m-d H:i:s');
    return M($table)->where("$pk=$id")->update($arr);
}

function updateBusiness($user_id, $update)
{
    return M('businesses')->where("user_id=$user_id")->update($update);
}


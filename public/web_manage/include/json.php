<?php
require 'common.inc.php';
require 'chkuser.inc.php';

//所有的提交集中处理
$action=I('get.action','','trim,htmlspecialchars');
//后台选择企业
if($action=='xzqy'){
	$name=I('get.key','','trim,htmlspecialchars');
	$map['member_name'] = array('like',"%$name%");
	$map['role'] = 2;
	$data = M('users')->field("id,member_name")->where($map)->select();
	$str='<li data-id="0">平台管理员</li>';
	foreach ($data as $row) {
		$str.="<li data-id=\"{$row['id']}\">{$row['member_name']}</li>";
	}
	echo $str;
}else{
	echo "";
}

//function deletePics($ids){//删除关联图片
//	$map['id']  = array('in',$ids);
//	$path = trim(ROOT_PATH, DS) . Config::get('pic.upload');
//	$data = M('pic')->where($map)->select();
//	M()->startTrans();
//	if(M('pic')->delete($ids)):
//		foreach ($data as $row) {
//			isset($row['img1']) ? @unlink($path.$row['img1']) : '';
//		}
//		M()->commit();
//		return true;
//	else:
//		M()->rollback();
//		return false;
//	endif;
//
//}



 ?>
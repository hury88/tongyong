<?php
require 'common.inc.php';
require 'chkuser.inc.php';

//所有的提交集中处理
$a = I('get.a','');
$t = I('t','');//表名
$s = I('s',0,'intval');
$id= I('id', 0,'intval');
if(empty($t))$t='news';

$pid   =   I('pid',0,'intval');
$ty    =   I('ty', 0,'intval');
$tty   =   I('tty',0,'intval');

if(IS_GET){

	//改变状态
		$action = array(

			'isstate' => config('webarr.isstate'),
			'certified' => config('webarr.certified'),
			'isgood'  => config('webarr.isgood'),
			'istop'   => config('webarr.istop'),
			'isdownload' => config('webarr.isdownload'),
			'isindex'   => config('webarr.istop'),
		);
		if(!empty($s)){//各种状态修改
			$remind = $action[$a];
			$a = $remind[2];
			if (empty($id)){
				echo 'no';
			}
			$set= M($t)->where("id=$id")->setField(array($a=>array('exp','NOT('.$a.')')));
			if ($set) {
				$val = M($t)->where("id=$id") ->getField($a);
				echo $remind[$val];
			}else{
				echo "no";
			}
		}
}
$map=array();
if(IS_POST){
	if(isset($_POST['ids'])) {
		// $checkid=$_POST['checkid'];
		$ids = $_POST['ids'];
		if(empty($ids))$ids=0;
		// $map['id']  = array('in',$ids);
		switch ($t) {
			case 'news_cats':
				$delStatus= deleteNewsCats($ids);
				break;
			case 'news':
				$delStatus= deleteNews($ids);
				break;
			case 'order':
				$delStatus= deleteOrders($ids);
				break;
			case 'usr':
				$delStatus= deleteUsers($ids);
			case 'usr_need':
				$delStatus= deleteUsrNeed($ids);
				break;
			case 'property':
				$delStatus= deleteProperty($ids);
				break;
			case 'pic':
				$delStatus= deletePics($ids);
				break;
			default:
				$delStatus= M($t)->delete($ids);
				$delStatus && AddLog("删除{$t}内容",$_SESSION['Admin_UserName']);
				break;
		}
		// $data = HR($t)->where($map)->select();

		 if ( $delStatus ) {
			ajaxReturn(1,'删除成功!');
		 }else{
			ajaxReturn(-1,'删除失败!');
		 }
	} elseif($a == 'dropupload') {
		$id = I('get.id',0,'intval');
		$cid = I('get.cid',0,'intval');
		$fields = array(
			'ti'=>$id,
			'cid'=>$cid,
			'title'=>'',
			'disorder'=>0,
			'isstate'=>1,
		);
		uppro('img1',$fields,'ajax');
		if (M('pic')->insert($fields)) {
			$img = src($fields['img1']);
			ajaxReturn(1,$img);
		}else{
			ajaxReturn(-1,'图片插入失败');
		}
	} else {//添加数据或者更新
		#出入表名
		$WithData = new WithData($t, $id);

		$ajaxReturn = $WithData->submit();

		ajaxReturn($ajaxReturn[0], $ajaxReturn[1]);


	}
}


function deleteNews($ids=0,$map=array()){//删除新闻及与他的子级
	$map['id']  = array('in',$ids);
	$path = trim(ROOT_PATH, DS) . Config::get('pic.upload');
	$data = M('news')->where($map)->select();
	M()->startTrans();
	if(M('news')->delete($ids)):
		foreach ($data as $key => $row) {
			AddLog("删除news内容:".$row['title'],$_SESSION['Admin_UserName']);
			isset($row['img1']) ? @unlink($path.$row['img1']) : '';
			isset($row['img2']) ? @unlink($path.$row['img2']) : '';
			isset($row['img3']) ? @unlink($path.$row['img3']) : '';
			isset($row['img4']) ? @unlink($path.$row['img4']) : '';
			isset($row['img5']) ? @unlink($path.$row['img5']) : '';
			isset($row['img6']) ? @unlink($path.$row['img6']) : '';
			isset($row['file']) ? @unlink($path.$row['file']) : '';
			$ids2 = M('pic')->where(array('ti'=>array('in',$ids)))->getField('id',true);
			if($ids2){
				// $ids2 = array_merge_values($ids2);
				$ids2 = implode(',',$ids2);
				deletePics($ids2);
			}
		/*$map2['tty']  = array('in',$ids);
		if($data2 = M('news')->where($map2)->select()){
			foreach ($data2 as $key2 => $row2) {
				M('news')->delete($row2['id']);
				isset($row2['img1']) ? @unlink($path.$row2['img1']) : '';
				isset($row2['img2']) ? @unlink($path.$row2['img2']) : '';
				isset($row2['img3']) ? @unlink($path.$row2['img3']) : '';
				isset($row2['img4']) ? @unlink($path.$row2['img4']) : '';
				isset($row2['img5']) ? @unlink($path.$row2['img5']) : '';
				isset($row2['img6']) ? @unlink($path.$row2['img6']) : '';
				isset($row2['file']) ? @unlink($path.$row2['file']) : '';
			}
		}*/
	}
	M()->commit();
	return true;
	else:
		M()->rollback();
		return false;
	endif;

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



 ?>

INSERT INTO `kw_nature` ( `typeid`, `pid`, `catname`, `catname2`, `img1`, `img2`, `content`, `linkurl`, `hits`, `isgood`, `isstate`, `disorder`) VALUES
( 76, 45, '关于仪器仪表装配人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于电子设备装配调试人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于计算机制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于电子器件制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于电子元件制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于电线电缆、光纤光缆及电工器材制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于输配电及控制设备制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于汽车整车制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于医疗器械制品和康复辅具生产人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于金属加工机械制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于通用基础件装配制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于工装工具制造加工人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于机械热加工人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于机械冷加工人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于硬质合金生产人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于金属轧制人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于轻有色金属冶炼人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于重有色金属冶炼人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于炼钢人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于炼铁人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于矿物采选人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于陶瓷制品制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于玻璃纤维及玻璃纤维增强塑料制品制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于水泥、石灰、石膏及其制品制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于药物制剂人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于中药饮片加工人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于涂料、油墨、颜料及类似产品制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于农药生产人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于化学肥料生产人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于基础化学原料制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于化工产品生产通用工艺人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于炼焦人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于工艺美术品制作人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于木制品制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于纺织品和服装剪裁缝纫人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于印染人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于织造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于纺纱人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于纤维预处理人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于酒、饮料及精制茶制造人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于乳制品加工人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于粮油加工人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于农机化服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于农村能源利用人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于动植物疫病防治人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于农业生产服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于畜禽种苗繁育人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于作物种子（苗）繁育生产人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于康复矫正服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于健康咨询服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于日用产品修理服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于计算机和办公设备维修人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于汽车摩托车修理技术服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于保健服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于美容美发服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于生活照料服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于有害生物防制人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于环境治理服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于野生动植物保护人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于自然保护区和草地监护人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于水文服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于水利设施管养人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于地质勘查人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于检验、检测和计量服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于测绘服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于海洋服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于安全保护服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于人力资源服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于物业管理服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于软件和信息技术服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于信息通信网络运行管理人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于广播电视传输服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于信息通信网络维护人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于餐饮服务人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于仓储人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于销售人员', '', '', '', '', '', 0, 1, 1, 0),
( 76, 45, '关于社会工作专业人员', '', '', '', '', '', 0, 1, 1, 0),


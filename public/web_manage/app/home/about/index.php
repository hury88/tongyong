<?php include DOCTYPE ?>
<?php include HEAD ?>
<?php innerBanner() ?>
<?php echo About::index() ?>
<?php //$obj =  new V($pid,$ty) ?>
<?php $obj =  Showtype::dispatch() ?>
<?php elseif ($ty==38): //企业文化 ?>
<?php elseif ($ty==41): //常见问题 ?>
<?php elseif ($ty==40): //意见反馈 ?>
<?php elseif ($ty==43): //服务合同 ?>
<?php elseif ($ty==39): //法律申明 ?>
<?php elseif ($ty==42): //用户协议 ?>
<?php elseif ($ty==37): //联系我们 ?>
<?php endif ?>
	<ul>
		<?php echo $obj->display ?>
	</ul>
	<ul>
		<?php echo $obj->pagestr ?>
	</ul>
<?php include FOOT ?>
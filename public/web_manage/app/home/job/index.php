<?php include DOCTYPE ?>
<?php include HEAD ?>
<?php innerBanner() ?>
<?php echo Job::index() ?>
<?php //$obj =  new V($pid,$ty) ?>
<?php $obj =  Showtype::dispatch() ?>
<?php elseif ($ty==7): //企业招聘 ?>
<?php elseif ($ty==8): //校园招聘 ?>
<?php elseif ($ty==77): //求职者平台 ?>
<?php elseif ($ty==64): //院校信息发布 ?>
<?php elseif ($ty==6): //高端招聘 ?>
<?php endif ?>
	<ul>
		<?php echo $obj->display ?>
	</ul>
	<ul>
		<?php echo $obj->pagestr ?>
	</ul>
<?php include FOOT ?>
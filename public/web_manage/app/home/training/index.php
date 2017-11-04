<?php include DOCTYPE ?>
<?php include HEAD ?>
<?php innerBanner() ?>
<?php echo Training::index() ?>
<?php //$obj =  new V($pid,$ty) ?>
<?php $obj =  Showtype::dispatch() ?>
<?php elseif ($ty==65): //企业培训 ?>
<?php elseif ($ty==66): //在线学习 ?>
<?php elseif ($ty==28): //技能培训 ?>
<?php endif ?>
	<ul>
		<?php echo $obj->display ?>
	</ul>
	<ul>
		<?php echo $obj->pagestr ?>
	</ul>
<?php include FOOT ?>
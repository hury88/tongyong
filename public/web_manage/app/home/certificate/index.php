<?php include DOCTYPE ?>
<?php include HEAD ?>
<?php innerBanner() ?>
<?php echo Certificate::index() ?>
<?php //$obj =  new V($pid,$ty) ?>
<?php $obj =  Showtype::dispatch() ?>
<?php elseif ($ty==10): //专升本信息 ?>
<?php elseif ($ty==11): //考研信息 ?>
<?php elseif ($ty==9): //职业资格信息 ?>
<?php endif ?>
	<ul>
		<?php echo $obj->display ?>
	</ul>
	<ul>
		<?php echo $obj->pagestr ?>
	</ul>
<?php include FOOT ?>
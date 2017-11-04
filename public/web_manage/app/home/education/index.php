<?php include DOCTYPE ?>
<?php include HEAD ?>
<?php innerBanner() ?>
<?php echo Education::index() ?>
<?php //$obj =  new V($pid,$ty) ?>
<?php $obj =  Showtype::dispatch() ?>
<?php elseif ($ty==14): //国际夏令营 ?>
<?php elseif ($ty==13): //国际游学 ?>
<?php elseif ($ty==12): //国际留学 ?>
<?php elseif ($ty==15): //国际联合办学 ?>
<?php endif ?>
	<ul>
		<?php echo $obj->display ?>
	</ul>
	<ul>
		<?php echo $obj->pagestr ?>
	</ul>
<?php include FOOT ?>
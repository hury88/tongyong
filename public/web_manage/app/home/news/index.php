<?php include DOCTYPE ?>
<?php include HEAD ?>
<?php innerBanner() ?>
<?php echo News::index() ?>
<?php //$obj =  new V($pid,$ty) ?>
<?php $obj =  Showtype::dispatch() ?>
<?php elseif ($ty==17): //公司新闻 ?>
<?php elseif ($ty==16): //教育新闻 ?>
<?php elseif ($ty==18): //行业新闻 ?>
<?php elseif ($ty==19): //近期活动 ?>
<?php endif ?>
	<ul>
		<?php echo $obj->display ?>
	</ul>
	<ul>
		<?php echo $obj->pagestr ?>
	</ul>
<?php include FOOT ?>
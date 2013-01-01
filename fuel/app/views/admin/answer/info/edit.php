<h2>Editing Answer_info</h2>
<br>

<?php echo render('answer/info/_form'); ?>
<p>
	<?php echo Html::anchor('answer/info/view/'.$answer_info->id, 'View'); ?> |
	<?php echo Html::anchor('answer/info', 'Back'); ?></p>

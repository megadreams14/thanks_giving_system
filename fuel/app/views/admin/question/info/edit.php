<h2>Editing Question_info</h2>
<br>

<?php echo render('admin/question/info/_form'); ?>
<p>
	<?php echo Html::anchor('admin/question/info/view/'.$question_info->id, 'View'); ?> |
	<?php echo Html::anchor('admin/question/info', 'Back'); ?></p>

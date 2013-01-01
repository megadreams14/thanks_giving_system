<h2>Editing Question_list</h2>
<br>

<?php echo render('admin/question/list/_form'); ?>
<p>
	<?php echo Html::anchor('admin/question/list/view/'.$question_list->id, 'View'); ?> |
	<?php echo Html::anchor('admin/question/list', 'Back'); ?></p>

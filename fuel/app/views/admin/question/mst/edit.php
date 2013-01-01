<h2>Editing Question_mst</h2>
<br>

<?php echo render('admin/question/mst/_form'); ?>
<p>
	<?php echo Html::anchor('admin/question/mst/view/'.$question_mst->id, 'View'); ?> |
	<?php echo Html::anchor('admin/question/mst', 'Back'); ?></p>

<h2>Viewing #<?php echo $question_list->id; ?></h2>

<p>
	<strong>Question event mst id:</strong>
	<?php echo $question_list->question_infos_mst_id; ?></p>
<p>
	<strong>Question mst id:</strong>
	<?php echo $question_list->question_mst_id; ?></p>

<?php echo Html::anchor('admin/question/list/edit/'.$question_list->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/question/list', 'Back'); ?>
<h2>Viewing #<?php echo $question_type_mst->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $question_type_mst->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $question_type_mst->description; ?></p>

<?php echo Html::anchor('question/type/mst/edit/'.$question_type_mst->id, 'Edit'); ?> |
<?php echo Html::anchor('question/type/mst', 'Back'); ?>
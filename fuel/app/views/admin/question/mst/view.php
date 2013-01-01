<h2>Viewing #<?php echo $question_mst->id; ?></h2>

<p>
	<strong>Question:</strong>
	<?php echo $question_mst->question; ?></p>
<p>
	<strong>Answer:</strong>
	<?php echo $question_mst->answer; ?></p>
<p>
	<strong>Select a:</strong>
	<?php echo $question_mst->select_a; ?></p>
<p>
	<strong>Select b:</strong>
	<?php echo $question_mst->select_b; ?></p>
<p>
	<strong>Select c:</strong>
	<?php echo $question_mst->select_c; ?></p>
<p>
	<strong>Select d:</strong>
	<?php echo $question_mst->select_d; ?></p>
<p>
	<strong>Question type mst id:</strong>
	<?php echo $question_mst->question_type_mst_id; ?></p>
<p>
	<strong>View type mst id:</strong>
	<?php echo $question_mst->view_type_mst_id; ?></p>
<p>
	<strong>Movies path:</strong>
	<?php echo $question_mst->movies_path; ?></p>

<?php echo Html::anchor('admin/question/mst/edit/'.$question_mst->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/question/mst', 'Back'); ?>
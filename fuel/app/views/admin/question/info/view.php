<h2>Viewing #<?php echo $question_info->id; ?></h2>

<p>
	<strong>User name:</strong>
	<?php echo $question_info->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $question_info->description; ?></p>
<p>
	<strong>Start:</strong>
	<?php echo $question_info->start; ?></p>
<p>
	<strong>End:</strong>
	<?php echo $question_info->end; ?></p>

<?php echo Html::anchor('admin/question/info/edit/'.$question_info->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/question/info', 'Back'); ?>
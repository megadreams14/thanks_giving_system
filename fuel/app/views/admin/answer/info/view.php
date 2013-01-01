<h2>Viewing #<?php echo $answer_info->id; ?></h2>

<p>
	<strong>User profile mst id:</strong>
	<?php echo $answer_info->user_profile_mst_id; ?></p>
<p>
	<strong>Question list id:</strong>
	<?php echo $answer_info->question_list_id; ?></p>

<?php echo Html::anchor('answer/info/edit/'.$answer_info->id, 'Edit'); ?> |
<?php echo Html::anchor('answer/info', 'Back'); ?>
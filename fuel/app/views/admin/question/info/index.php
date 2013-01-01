<h2>Listing Question_infos</h2>
<br>
<?php if ($question_infos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User name</th>
			<th>Description</th>
			<th>Start</th>
			<th>End</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($question_infos as $question_info): ?>		<tr>

			<td><?php echo $question_info->title; ?></td>
			<td><?php echo $question_info->description; ?></td>
			<td><?php echo $question_info->start; ?></td>
			<td><?php echo $question_info->end; ?></td>
			<td>
				<?php echo Html::anchor('admin/question/info/view/'.$question_info->id, 'View'); ?> |
				<?php echo Html::anchor('admin/question/info/edit/'.$question_info->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/question/info/delete/'.$question_info->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Question_infos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/question/info/create', 'Add new Question info', array('class' => 'btn btn-success')); ?>

</p>

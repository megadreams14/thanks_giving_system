<h2>Listing Question_lists</h2>
<br>
<?php if ($question_lists): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Question infos mst id</th>
			<th>Question mst id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($question_lists as $question_list): ?>		<tr>

			<td><?php echo $question_list->question_infos_mst_id; ?></td>
			<td><?php echo $question_list->question_mst_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/question/list/view/'.$question_list->id, 'View'); ?> |
				<?php echo Html::anchor('admin/question/list/edit/'.$question_list->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/question/list/delete/'.$question_list->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Question_lists.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/question/list/create', 'Add new Question list', array('class' => 'btn btn-success')); ?>

</p>

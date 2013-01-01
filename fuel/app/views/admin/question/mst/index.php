<h2>Listing Question_msts</h2>
<br>
<?php if ($question_msts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Question</th>
			<th>Answer</th>
			<th>Select a</th>
			<th>Select b</th>
			<th>Select c</th>
			<th>Select d</th>
			<th>Question type mst id</th>
			<th>View type mst id</th>
			<th>Movies path</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($question_msts as $question_mst): ?>		<tr>

			<td><?php echo $question_mst->question; ?></td>
			<td><?php echo $question_mst->answer; ?></td>
			<td><?php echo $question_mst->select_a; ?></td>
			<td><?php echo $question_mst->select_b; ?></td>
			<td><?php echo $question_mst->select_c; ?></td>
			<td><?php echo $question_mst->select_d; ?></td>
			<td><?php echo $question_mst->question_type_mst_id; ?></td>
			<td><?php echo $question_mst->view_type_mst_id; ?></td>
			<td><?php echo $question_mst->movies_path; ?></td>
			<td>
				<?php echo Html::anchor('admin/question/mst/view/'.$question_mst->id, 'View'); ?> |
				<?php echo Html::anchor('admin/question/mst/edit/'.$question_mst->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/question/mst/delete/'.$question_mst->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Question_msts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/question/mst/create', 'Add new Question mst', array('class' => 'btn btn-success')); ?>

</p>

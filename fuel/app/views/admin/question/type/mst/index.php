<h2>Listing Question_type_msts</h2>
<br>
<?php if ($question_type_msts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($question_type_msts as $question_type_mst): ?>		<tr>

			<td><?php echo $question_type_mst->title; ?></td>
			<td><?php echo $question_type_mst->description; ?></td>
			<td>
				<?php echo Html::anchor('question/type/mst/view/'.$question_type_mst->id, 'View'); ?> |
				<?php echo Html::anchor('question/type/mst/edit/'.$question_type_mst->id, 'Edit'); ?> |
				<?php echo Html::anchor('question/type/mst/delete/'.$question_type_mst->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Question_type_msts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('question/type/mst/create', 'Add new Question type mst', array('class' => 'btn btn-success')); ?>

</p>

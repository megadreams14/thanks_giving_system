<h2>Listing Answer_infos</h2>
<br>
<?php if ($answer_infos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User profile mst id</th>
			<th>Question list id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($answer_infos as $answer_info): ?>		<tr>

			<td><?php echo $answer_info->user_profile_mst_id; ?></td>
			<td><?php echo $answer_info->question_list_id; ?></td>
			<td>
				<?php echo Html::anchor('answer/info/view/'.$answer_info->id, 'View'); ?> |
				<?php echo Html::anchor('answer/info/edit/'.$answer_info->id, 'Edit'); ?> |
				<?php echo Html::anchor('answer/info/delete/'.$answer_info->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Answer_infos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('answer/info/create', 'Add new Answer info', array('class' => 'btn btn-success')); ?>

</p>

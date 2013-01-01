<h2>Listing User_profile_msts</h2>
<br>
<?php if ($user_profile_msts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($user_profile_msts as $user_profile_mst): ?>		<tr>

			<td><?php echo $user_profile_mst->user_name; ?></td>
			<td>
				<?php echo Html::anchor('user/profile/mst/view/'.$user_profile_mst->id, 'View'); ?> |
				<?php echo Html::anchor('user/profile/mst/edit/'.$user_profile_mst->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/profile/mst/delete/'.$user_profile_mst->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No User_profile_msts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/profile/mst/create', 'Add new User profile mst', array('class' => 'btn btn-success')); ?>

</p>

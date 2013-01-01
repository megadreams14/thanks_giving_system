<h2>Listing View_type_msts</h2>
<br>
<?php if ($view_type_msts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Discription</th>
			<th>File name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($view_type_msts as $view_type_mst): ?>		<tr>

			<td><?php echo $view_type_mst->discription; ?></td>
			<td><?php echo $view_type_mst->file_name; ?></td>
			<td>
				<?php echo Html::anchor('view/type/mst/view/'.$view_type_mst->id, 'View'); ?> |
				<?php echo Html::anchor('view/type/mst/edit/'.$view_type_mst->id, 'Edit'); ?> |
				<?php echo Html::anchor('view/type/mst/delete/'.$view_type_mst->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No View_type_msts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('view/type/mst/create', 'Add new View type mst', array('class' => 'btn btn-success')); ?>

</p>

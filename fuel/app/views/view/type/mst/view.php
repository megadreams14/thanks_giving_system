<h2>Viewing #<?php echo $view_type_mst->id; ?></h2>

<p>
	<strong>Discription:</strong>
	<?php echo $view_type_mst->discription; ?></p>
<p>
	<strong>File name:</strong>
	<?php echo $view_type_mst->file_name; ?></p>

<?php echo Html::anchor('view/type/mst/edit/'.$view_type_mst->id, 'Edit'); ?> |
<?php echo Html::anchor('view/type/mst', 'Back'); ?>
<h2>Viewing #<?php echo $user_profile_mst->id; ?></h2>

<p>
	<strong>User name:</strong>
	<?php echo $user_profile_mst->user_name; ?></p>

<?php echo Html::anchor('user/profile/mst/edit/'.$user_profile_mst->id, 'Edit'); ?> |
<?php echo Html::anchor('user/profile/mst', 'Back'); ?>
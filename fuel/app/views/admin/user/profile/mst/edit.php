<h2>Editing User_profile_mst</h2>
<br>

<?php echo render('user/profile/mst/_form'); ?>
<p>
	<?php echo Html::anchor('user/profile/mst/view/'.$user_profile_mst->id, 'View'); ?> |
	<?php echo Html::anchor('user/profile/mst', 'Back'); ?></p>

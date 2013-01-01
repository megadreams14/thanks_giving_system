<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('User name', 'user_name'); ?>

			<div class="input">
				<?php echo Form::input('user_name', Input::post('user_name', isset($user_profile_mst) ? $user_profile_mst->user_name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
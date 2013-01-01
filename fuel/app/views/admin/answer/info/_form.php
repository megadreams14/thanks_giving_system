<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('User profile mst id', 'user_profile_mst_id'); ?>

			<div class="input">
				<?php echo Form::input('user_profile_mst_id', Input::post('user_profile_mst_id', isset($answer_info) ? $answer_info->user_profile_mst_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Question list id', 'question_list_id'); ?>

			<div class="input">
				<?php echo Form::input('question_list_id', Input::post('question_list_id', isset($answer_info) ? $answer_info->question_list_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Question infos mst id', 'question_infos_mst_id'); ?>

			<div class="input">
				<?php echo Form::input('question_infos_mst_id', Input::post('question_infos_mst_id', isset($question_list) ? $question_list->question_infos_mst_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Question mst id', 'question_mst_id'); ?>

			<div class="input">
				<?php echo Form::input('question_mst_id', Input::post('question_mst_id', isset($question_list) ? $question_list->question_mst_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
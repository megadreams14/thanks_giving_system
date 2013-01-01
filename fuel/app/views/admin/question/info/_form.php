<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($question_info) ? $question_info->title : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::input('description', Input::post('description', isset($question_info) ? $question_info->description : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Start', 'start'); ?>

			<div class="input">
				<?php echo Form::input('start', Input::post('start', isset($question_info) ? $question_info->start : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('End', 'end'); ?>

			<div class="input">
				<?php echo Form::input('end', Input::post('end', isset($question_info) ? $question_info->end : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
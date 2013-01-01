<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Question', 'question'); ?>

			<div class="input">
				<?php echo Form::input('question', Input::post('question', isset($question_mst) ? $question_mst->question : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Answer', 'answer'); ?>

			<div class="input">
				<?php echo Form::input('answer', Input::post('answer', isset($question_mst) ? $question_mst->answer : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Select a', 'select_a'); ?>

			<div class="input">
				<?php echo Form::input('select_a', Input::post('select_a', isset($question_mst) ? $question_mst->select_a : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Select b', 'select_b'); ?>

			<div class="input">
				<?php echo Form::input('select_b', Input::post('select_b', isset($question_mst) ? $question_mst->select_b : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Select c', 'select_c'); ?>

			<div class="input">
				<?php echo Form::input('select_c', Input::post('select_c', isset($question_mst) ? $question_mst->select_c : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Select d', 'select_d'); ?>

			<div class="input">
				<?php echo Form::input('select_d', Input::post('select_d', isset($question_mst) ? $question_mst->select_d : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Question type mst id', 'question_type_mst_id'); ?>

			<div class="input">
				<?php echo Form::input('question_type_mst_id', Input::post('question_type_mst_id', isset($question_mst) ? $question_mst->question_type_mst_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('View type mst id', 'view_type_mst_id'); ?>

			<div class="input">
				<?php echo Form::input('view_type_mst_id', Input::post('view_type_mst_id', isset($question_mst) ? $question_mst->view_type_mst_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Movies path', 'movies_path'); ?>

			<div class="input">
				<?php echo Form::input('movies_path', Input::post('movies_path', isset($question_mst) ? $question_mst->movies_path : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
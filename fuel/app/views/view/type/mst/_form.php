<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Discription', 'discription'); ?>

			<div class="input">
				<?php echo Form::input('discription', Input::post('discription', isset($view_type_mst) ? $view_type_mst->discription : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('File name', 'file_name'); ?>

			<div class="input">
				<?php echo Form::input('file_name', Input::post('file_name', isset($view_type_mst) ? $view_type_mst->file_name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
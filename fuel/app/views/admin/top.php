<h1>登録問題一覧</h1>
<br>
<?php if ($view_data['question_mst']): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>問題文</th>
			<th>答え</th>
			<th>選択肢A</th>
			<th>選択肢b</th>
			<th>選択肢c</th>
			<th>選択肢d</th>
			<th>問題タイプ</th>
			<th>ビュータイプ</th>
			<th>動画パス</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($view_data['question_mst'] as $question_mst): ?>		<tr>

			<td><?php echo $question_mst->question; ?></td>
			<td><?php echo $question_mst->answer; ?></td>
			<td><?php echo $question_mst->select_a; ?></td>
			<td><?php echo $question_mst->select_b; ?></td>
			<td><?php echo $question_mst->select_c; ?></td>
			<td><?php echo $question_mst->select_d; ?></td>
			<td><?php echo $question_mst->question_type_mst_id; ?></td>
			<td><?php echo $question_mst->view_type_mst_id; ?></td>
			<td><?php echo $question_mst->movies_path; ?></td>
			<td>
				<?php echo Html::anchor('admin/question/mst/view/'.$question_mst->id, 'View'); ?> |
				<?php echo Html::anchor('admin/question/mst/edit/'.$question_mst->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/question/mst/delete/'.$question_mst->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Question_msts.</p>

<?php endif; ?><p>

</p>

<h1>登録問題一覧</h1>

<p>出題する問題イベントを選択して下さい</p>

<?php if ($view_data['question_info']): ?>

    <form action="top/operation" method="GET">
        <select name="question_info_id">
            <?php foreach ($view_data['question_info'] as $question_info):?>
                <option value="<?php echo $question_info->id; ?>"><?php echo $question_info->title;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="この問題を出題する">
    </form>
<?php else: ?>
    <p>問題リストがありません.</p>
<?php endif; ?><p>

</p>

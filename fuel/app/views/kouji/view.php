<h2>Viewing <span class='muted'>#<?php echo $kouji->id; ?></span></h2>

<p>
	<strong>Kouji cd:</strong>
	<?php echo $kouji->kouji_cd; ?></p>
<p>
	<strong>Kouji name:</strong>
	<?php echo $kouji->kouji_name; ?></p>
<p>
	<strong>Kouji type:</strong>
	<?php echo $kouji->kouji_type; ?></p>
<p>
	<strong>Kouji state:</strong>
	<?php echo $kouji->kouji_state; ?></p>
<p>
	<strong>Ip:</strong>
	<?php echo $kouji->ip; ?></p>

<?php echo Html::anchor('kouji/edit/'.$kouji->id, '編集'); ?> |
<?php echo Html::anchor('kouji', '戻る'); ?>
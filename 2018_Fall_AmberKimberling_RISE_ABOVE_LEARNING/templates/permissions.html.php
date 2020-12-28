<aside>
	<div class="contain3">
		<h4>"There are many problems, but I think there is a solution to all these problems; it's just one, and it's education."</h4>
		<h5>- <i>Malala Yousafzai</i></h5>
	</div>
</aside>
<main>
	<div class="contain2">
		<form action="" method="post">
			<fieldset>
				<legend><h1>EDIT PERMISSIONS</h1></legend>
				<h3><?=$user->fname?>:</h3>
				<?php foreach ($permissions as $name => $value): ?>
				<p class="permish">
					<input name="permissions[]" type="checkbox" value="<?=$value?>" <?php if ($user->hasPermission($value)) echo 'checked'?> />
					<label><?=ucwords(strtolower(str_replace('_', ' ', $name)))?>
					<div class="clear"></div>
					<hr>
				</p>
				<?php endforeach; ?>
				<input class="cat" type="submit" value="Submit" />
			</fieldset>
		</form>
<div class="clear"></div>
</main>
<div class="clear"></div>
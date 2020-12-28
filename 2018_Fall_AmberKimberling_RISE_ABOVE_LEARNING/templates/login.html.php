<aside> 
	<div class="contain3">
		<h4>"Learning is not attained by chance, it must be sought for with ardor and diligence."</h4>
		<h5>- <i>Abigail Adams</i></h5>
	</div>
</aside>
<main>
	<div class="contain2">
		<?php if (isset($error)):?>
			<div class="errors"><p><?=$error;?></p></div>
		<?php endif; ?>
		<form method="post" action="">
			<fieldset>
				<legend><h1>SIGN IN</h1></legend>
				<div class="formcon">
					<label for="email">Email Address</label>
					<input type="text" id="email" name="email">
					<div class="clear"></div>
					<label for="password">Password</label>
					<input type="password" id="password" name="password">
					<div class="clear"></div>
					<input class="submit" type="submit" name="login" value="Log in">
				</div>
			</fieldset>
		</form>
	</div>
<div class="clear"></div>
</main>
<div class="clear"></div>
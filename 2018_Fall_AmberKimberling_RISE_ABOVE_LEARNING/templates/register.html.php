<aside> 
	<div class="contain3">
		<h4>"Education is the foundation upon which we build our future."</h4>
		<h5>- <i>Christine Ggregoire</i></h5>
	</div>
</aside>
<main>
	<div class="contain2">
		<?php if (!empty($errors)): ?>
			<div class="errors">
				<p>Sorry, your account could not be created, please check the following:</p>
				<ul>
				<?php foreach ($errors as $error): ?>
					<li><?= $error ?></li>
				<?php endforeach; 	?>
				</ul>
			</div>
		<?php endif; ?>
		<form action="" method="post">
			<fieldset>
					<legend><h1>USER REGISTRATION</h1></legend>
					<label for="email">Email Address</label>
					<input name="user[email]" id="email" type="text" value="<?=$user['email'] ?? ''?>">
					<div class="clear"></div>

					<label for="fname">First Name</label>
					<input name="user[fname]" id="name" type="text" value="<?=$user['fname'] ?? ''?>">
					<div class="clear"></div>

					<label for="lname">Last name</label>
					<input name="user[lname]" id="name" type="text" value="<?=$user['lname'] ?? ''?>">
					<div class="clear"></div>

					<label for="password">Password</label>
					<input name="user[password]" id="password" type="password" value="<?=$user['password'] ?? ''?>">
					<div class="clear"></div>

					<input class="submit" type="submit" name="submit" value="Register">
					<div class="clear"></div>
			</fieldset>
		</form>
		<div class="clear"></div>
<div class="clear"></div>
</main>
<div class="clear"></div>
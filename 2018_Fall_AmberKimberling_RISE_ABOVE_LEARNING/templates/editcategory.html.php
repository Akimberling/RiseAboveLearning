<aside> 
	<div class="contain3">
		<h4>"Education is the key to success in life, and teachers make a lasting impact in the lives of their students."</h4>
		<h5>- <i>Solomon Ortiz</i></h5>
	</div>
</aside>
<main>
	<div class="contain2">
		<form action="" method="post">
			<fieldset>
				<legend><h1>ADD/EDIT CATEGORIES</h1></legend>
				<input type="hidden" name="category[id]" value="<?=$category->id ?? ''?>">
				<label for="categoryname">Enter category name:</label>
				<input type="text" id="categoryname" name="category[name]" value="<?=$category->name ?? ''?>" />
				<input class="submit" type="submit" name="submit" value="Save">
			</fieldset>
		</form>
<div class="clear"></div>
</main>
<div class="clear"></div>

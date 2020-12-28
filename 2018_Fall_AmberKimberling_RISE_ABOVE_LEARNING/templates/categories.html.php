<aside>
	<div class="contain3">
		<h4>"Any man who reads too much and uses his own brain too little falls into lazy habits of thinking. "</h4>
		<h5>- <i>Albert Einstein</i></h5>
	</div>
</aside>
<main>
	<div class="contain2">		
		  <form action="index.php?category/delete" method="post">
		  	<fieldset>
		  		<legend><h1>CATEGORIES</h1></legend>
		  		<?php foreach($categories as $category): ?>
			  		<p><?=htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8')?>
			  		&nbsp; : &nbsp;<a href="index.php?category/edit?id=<?=$category->id?>">Edit</a>
				    <input type="hidden" name="id" value="<?=$category->id?>">
				    <input class="cat" type="submit" value="Delete">
				    </p>
				    <hr>
				    <div class="clear"></div>
			    <?php endforeach; ?>
		    </fieldset>
		  </form>
	</div>
</main>
<div class="clear"></div>
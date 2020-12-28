<div class="quizlist">

<aside> 
  <div class="contain3">
    <h4 class="title">CATEGORIES</h4>
    <ul class="categories">
      <hr>
      <?php foreach($categories as $category): ?>
    	<li><a class="quiz" href="index.php?quiz/list?category=<?=$category->id?>"><?=$category->name?></a></li>
      <hr>
      <?php endforeach; ?>
      <li><a class="quiz" href="index.php?quiz/list">All Quizzes</a></li>
      <hr>
    </ul>
  </div>
</aside>

<main>
  <div class="contain2">
            <fieldset>
              <legend><h1>QUIZZES</h1></legend>
              <?php foreach($quizzes as $quiz): ?>
              <p>
          		<a class="edit" href="index.php?quiz/take?id=<?=$quiz->id?>"><b><?=(new \Ninja\Markdown($quiz->quiztext))->toHtml()?></b></a>

          			(by <a class="forms" href="mailto:<?=htmlspecialchars($quiz->getUser()->email, ENT_QUOTES,
          							'UTF-8'); ?>">
          						<?=htmlspecialchars($quiz->getUser()->fname, ENT_QUOTES,
          							'UTF-8'); ?></a> on 
          			<?php
          			$date = new DateTime($quiz->quizdate);

          			echo $date->format('jS F Y');
          			?>)

                <?php if ($user): ?>
                    <?php if ($user->id == $quiz->userId || $user->hasPermission(\Raldb\Entity\User::DELETE_QUIZZES)): ?>
                       &nbsp; : &nbsp;<a class="edit" href="index.php?quiz/edit?id=<?=$quiz->id?>">Edit</a>
                   <?php endif; ?>
        			    <?php if ($user->id == $quiz->userId || $user->hasPermission(\Raldb\Entity\User::DELETE_QUIZZES)): ?>
            				 <div class="clearsmall"></div>
                  <form action="index.php?quiz/delete" method="post">
                    <input type="hidden" name="id" value="<?=$quiz->id?>">
            				<input class="cat" type="submit" value="Delete">
                  </form>
                     </p>
                  <?php endif; ?>
                <?php endif; ?>
              <div class="clear"></div>
              <hr>
              <?php endforeach; ?>
            </fieldset>
  	
    <br>
    <br>
    <?php echo $totalQuizzes ?'Select page:': ''?> 

    <?php

    $numPages = ceil($totalQuizzes/10);

    for ($i = 1; $i <= $numPages; $i++):
      if ($i == $currentPage):
    ?>
      <a class="forms" class="currentpage" href="index.php?quiz/list?page=<?=$i?><?=!empty($categoryId) ? '&category=' . $categoryId : '' ?>"><?=$i?></a>
    <?php else: ?>
      <a href="index.php?quiz/list?page=<?=$i?><?=!empty($categoryId) ? '&category=' . $categoryId : '' ?>"><?=$i?></a>
    <?php endif; ?>
    <?php endfor; ?>

    </div>
  </div>  
    <div class="clear"></div>
</main>
<div class="clear"></div>

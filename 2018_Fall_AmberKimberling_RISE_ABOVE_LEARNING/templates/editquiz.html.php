<aside>
    <div class="contain3">
         <h4>"The roots of education are bitter, but the fruit is sweet."</h4>
         <h5>- <i>Aristotle</i></h5>
    </div>
</aside>
<main>
    <div class="contain2">
        <?php if (empty($quiz->id) || $user->id == $quiz->userId || $user->hasPermission(\Raldb\Entity\User::EDIT_QUIZZES)): ?>
        <form action="" method="post">
            <fieldset>
                <legend><h1>ADD/EDIT QUIZZES</h1></legend>
        	<input type="hidden" name="quiz[id]" value="<?=$quiz->id ?? ''?>">
            <label for="quiztext">Quiz Title:</label>
             <div class="clear"></div>
            <textarea id="quiztext" name="quiz[quiztext]" rows="3" cols="40"><?=$quiz->quiztext ?? ''?></textarea>
             <div class="clear"></div>
            <p>Select categories for this Quiz:</p>
            <?php foreach ($categories as $category): ?>

            <?php if ($quiz && $quiz->hasCategory($category->id)): ?>
            <input type="checkbox" checked name="category[]" value="<?=$category->id?>" /> 
            <?php else: ?>
            <input type="checkbox" name="category[]" value="<?=$category->id?>" /> 
            <?php endif; ?>

            <label><?=$category->name?></label>
             <div class="clear"></div>
            <?php endforeach; ?>

            <input type="submit" name="submit" value="Save">
        </form>
        <?php else: ?>

        <p>You may only edit quizzes that you posted.</p>

        <?php endif; ?>

        </fieldset>
        <br>
        <br>
    </div>
    <div class="clear"></div>
</main>
 <div class="clear"></div>
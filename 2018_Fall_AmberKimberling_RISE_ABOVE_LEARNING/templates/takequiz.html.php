<aside>
	<div class="contain3">
		<h3>QUIZ INSTRUCTIONS:</h3>
		<p>1. Begin taking the quiz at your leizure</p>
		<p>2. Take your time</p>
		<p>3. Read Each question carefully</p>
		<p>4. If you cheat it will not help you learn anything</p>
		<p>5. You may take the quiz as many as times as you desire.</p>
		<p>6. Good Luck!</p>
		<p>7. <a class="asiquiz" href="index.php?quiz/list">Back to the Quiz</a></p>
	</div>
</aside>
<main>
	<!-- 11/07/18 - AK - checks the answers on each of the quizzes -->
	<script type="text/javascript">
		function checkAnswers()
         {
         	//11/07/18 - AK - takes the information in the html document
			var myQuiz = document.getElementById( "myQuiz" );
			var result = document.getElementById( "result" );
			//11/07/18 - AK - variables to count questions and right answers
         	var totalQuestions = 0;
         	var questionsRight = 0;
			
         	var answers = [1, 7, 9, 13, 17, 22, 25, 29, 33, 39];

			result.value = ""; 
			//11/07/18 - AK - checks each question
			for(var z = 0; z<10; z++)
			{
		        if ( myQuiz.elements[ answers[ z ]].checked )  
	            {
				  	result.value += "Q" + (z+1) +": correct" + "\n" ;

				    questionsRight++;
	            	totalQuestions++;
				}
	            else 
	            {
				    result.value += "Q" + (z+1) +" incorrect" + "\n";

	            	totalQuestions++;
				}
			}

            percentScore = (questionsRight / totalQuestions) * 100;
			result.value += "Your final score is " + questionsRight + "/" + totalQuestions +
            " or " + percentScore.toFixed(0) + "%" + "\n"; 
		}
	</script>
	<div class="contain2">
	<form id="myQuiz" class="quizForm" action="">
		<fieldset>
			<legend><h1><?=(new \Ninja\Markdown($quiz->quiztext))->toHtml()?></h1></legend>
			<?php
			//11/07/18 - AK - reads a text file line by line and displays it 
			$file = fopen("_txt/". $quiz->id . ".txt","r") or die("Current Quiz is under construction!");
			do
			  {
			  echo fgets($file). " ";
			  }while(! feof($file));

			fclose($file);
			?>
			<input class="butt" onclick="checkAnswers()" type = "button" name = "Grade" value = "Grade" />
     		<input class="butt" type = "reset" name = "reset" value = "Reset" />
			<div class=clear></div>
			<br />RESULTS OF THE QUIZ: <br />
            <p> <textarea id = "result" rows="12" cols="60" disabled> </textarea> </p>
		</fieldset>
	</form>
	<br> 
	<br>
	</div>
	<div class="clear"></div>
</main>
<div class="clear"></div>

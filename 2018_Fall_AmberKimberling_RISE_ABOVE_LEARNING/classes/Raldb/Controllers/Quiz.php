<?php
namespace Raldb\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Quiz {
	private $usersTable;
	private $quizTable;
	private $categoriesTable;
	private $quizCategoriesTable; 
	private $authentication;

	public function __construct(DatabaseTable $quizTable, DatabaseTable $usersTable, DatabaseTable $categoriesTable, 
	     DatabaseTable $quizCategoriesTable, Authentication $authentication) { 
    	$this->quizTable = $quizTable;
		$this->usersTable = $usersTable;
		$this->categoriesTable = $categoriesTable;
		$this->quizCategoriesTable = $quizCategoriesTable; 
		$this->authentication = $authentication;
	}

//11/07/18 - AK - display the list of quizzes associated with a category
	public function list() {

		$page = $_GET['page'] ?? 1;

		$offset = ($page-1)*10;

		if (isset($_GET['category'])) {
			$category = $this->categoriesTable->findById($_GET['category']);
			$quizzes = $category->getQuizzes(10, $offset);
			$totalQuizzes = $category->getNumQuizzes();
		}
		else {
			$quizzes = $this->quizTable->findAll('quizdate DESC', 10, $offset);
			$totalQuizzes = $this->quizTable->total();
		}		

		$title = 'Quiz list';

		

		$user = $this->authentication->getUser();

		return ['template' => 'quiz.html.php', 
				'title' => $title, 
				'variables' => [
						'totalQuizzes' => $totalQuizzes,
						'quizzes' => $quizzes,
						'user' => $user,
						'categories' => $this->categoriesTable->findAll(),
						'currentPage' => $page,
						'categoryId' => $_GET['category'] ?? null
					]
				];
	}
	//11/07/18 - AK - provides the name of the quizzes and directs it to the takequiz page 
	public function takeQuiz() {
		$user = $this->authentication->getUser();

		if (isset($_GET['id'])) {
			$quiz = $this->quizTable->findById($_GET['id']);
		}
		$title = 'take quiz';

		return ['template' => 'takequiz.html.php',
				'title' => $title,
				'variables' => [
						'quiz' => $quiz ?? null,
						'user' => $user
					]
				];
	}
	//11/07/18 - AK - directs it to the home page
	public function home() {

		$title = 'WELOME!';
		return ['template' => 'home.html.php','title' => $title];
	}
	//11/07/18 - AK - directs it to the about page
	public function about() {

		$title = 'ABOUT';
		return ['template' => 'about.html.php','title' => $title];
	}
	//11/07/18 - AK - directs it to the contact page
	public function contact() {

		$title = 'CONTACT';
		return ['template' => 'contact.html.php','title' => $title];
	}
	//11/07/18 - AK - directs it to the qa page
	public function qa() {

		$title = 'QA';
		return ['template' => 'qa.html.php','title' => $title];
	}
	
//11/07/18 - AK - delete the quiz in this category and delete it in the quiz category table as well
	public function delete() {

		$user = $this->authentication->getUser();

		$quiz = $this->quizTable->findById($_POST['id']);

		if ($quiz->userId != $user->id && !$user->hasPermission(\Raldb\Entity\User::DELETE_QUIZZES) ) {
			return;
		}
		
        $this->quizCategoriesTable->deleteWhere('quizid', $_POST['id']); 
	
		
		$this->quizTable->delete($_POST['id']);  
		
        header('location: index.php?quiz/list');  	

	}
	//11/07/18 - provides the information to be edited in quiz
	public function saveEdit() {
		$user = $this->authentication->getUser();

		$quiz = $_POST['quiz'];
		$quiz['quizdate'] = new \DateTime();

		$quizEntity = $user->addQuiz($quiz);

		$quizEntity->clearCategories();

		foreach ($_POST['category'] as $categoryId) {
			$quizEntity->addCategory($categoryId);
		}

		header('location: index.php?quiz/list'); 	

	}
	//11/07/18 - AK - checks for permissions of the user and directs to the editquiz page
	public function edit() {
		$user = $this->authentication->getUser();
		$categories = $this->categoriesTable->findAll();

		if (isset($_GET['id'])) {
			$quiz = $this->quizTable->findById($_GET['id']);
		}

		$title = 'Edit quiz';

		return ['template' => 'editquiz.html.php',
				'title' => $title,
				'variables' => [
						'quiz' => $quiz ?? null,
						'user' => $user,
						'categories' => $categories
					]
				];
	}
	
}
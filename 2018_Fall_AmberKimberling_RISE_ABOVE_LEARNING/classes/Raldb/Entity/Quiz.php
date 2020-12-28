<?php
namespace Raldb\Entity;

class Quiz {
	public $id;
	public $userId;
	public $quizdate;
	public $quiztext;
	private $usersTable;
	private $user;
	private $quizCategoriesTable;

	public function __construct(\Ninja\DatabaseTable $usersTable, \Ninja\DatabaseTable $quizCategoriesTable) {
		$this->usersTable = $usersTable;
		$this->quizCategoriesTable = $quizCategoriesTable;
	}
	//11/07/18 - AK - grabs the user that was logged in
	public function getUser() {
		if (empty($this->user)) {
			$this->user = $this->usersTable->findById($this->userId);
		}
		
		return $this->user;
	}

	//11/07/18 - AK - saving the added category 
	public function addCategory($categoryId) {
		$quizCat = ['quizId' => $this->id, 'categoryId' => $categoryId];

		$this->quizCategoriesTable->save($quizCat);
	}

	//11/07/18 - AK - checking to see if the quiz has a category
	public function hasCategory($categoryId) {
		$quizCategories = $this->quizCategoriesTable->find('quizId', $this->id);

		foreach ($quizCategories as $quizCategory) {
			if ($quizCategory->categoryId == $categoryId) {
				return true;
			}
		}
	}

	//11/07/18 - AK - delete the quizzes associated with this category
	public function clearCategories() {
		$this->quizCategoriesTable->deleteWhere('quizId', $this->id);
	}
}
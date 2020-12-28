<?php
namespace Raldb\Entity;

use Ninja\DatabaseTable;

class Category {
	public $id;
	public $name;
	private $quizTable;
	private $quizCategoriesTable;

	public function __construct(DatabaseTable $quizTable, DatabaseTable $quizCategoriesTable) {
		$this->quizTable = $quizTable;
		$this->quizCategoriesTable = $quizCategoriesTable;
	}
	//11/07/18 - AK - grabs the quiz information stores it into an array and sorts it 
	public function getQuizzes($limit = null, $offset = null) {
		$quizCategories = $this->quizCategoriesTable->find('categoryId', $this->id, null, $limit, $offset);
		
		$quizzes = [];

		foreach ($quizCategories as $quizCategory) {
			$quiz =  $this->quizTable->findById($quizCategory->quizId);
			
			if ($quiz) {
				$quizzes[] = $quiz;
			}			
		}

		usort($quizzes, [$this, 'sortQuizzes']);

		return $quizzes;
	}
	//11/07/18 - AK - returns the total number of quizzes
	public function getNumQuizzes() {
		return $this->quizCategoriesTable->total('categoryId', $this->id);
	}
	//11/07/18 - AK - sorts quizzes by date they were made
	private function sortQuizzes($a, $b) {
		$aDate = new \DateTime($a->quizdate);
		$bDate = new \DateTime($b->quizdate);

		if ($aDate->getTimestamp() == $bDate->getTimestamp()) {
			return 0;
		}

		return $aDate->getTimestamp() < $bDate->getTimestamp() ? -1 : 1;
	}
}
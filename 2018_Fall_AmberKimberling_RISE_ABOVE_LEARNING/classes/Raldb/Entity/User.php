<?php
namespace Raldb\Entity;

class User {

	//11/07/18 - AK - permissions
	const EDIT_QUIZZES = 1;
	const DELETE_QUIZZES = 2;
	const ADD_CATEGORIES = 4;
	const EDIT_CATEGORIES = 8;
	const REMOVE_CATEGORIES = 16;
	const EDIT_USER_ACCESS = 32;

	public $id;
	public $fname;
	public $email;
	public $password;
	private $quizTable;

	public function __construct(\Ninja\DatabaseTable $quizTable) {
		$this->quizTable = $quizTable;
	}
	//11/07/18 - AK - passes the quiz to the save function
	public function addQuiz($quiz) {
		$quiz['userId'] = $this->id;

		return $this->quizTable->save($quiz);
	}
	//11/07/18 - AK - retrieve the quizzes that were posted by a user
	public function getQuizzes() {
		return $this->quizTable->find('userId', $this->id);
	}
	//11/07/18 - AK - checks if the user has permission
	public function hasPermission($permission) {
		return $this->permissions & $permission;
	}
}
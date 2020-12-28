<?php
namespace Raldb;

class RaldbRoutes implements \Ninja\Routes {
	private $usersTable;
	private $categoriesTable;
	private $quizTable;
	private $quizcategoriesTable;
	private $authentication;

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';

 		$this->categoriesTable = new \Ninja\DatabaseTable($pdo, 'category', 'id', '\Raldb\Entity\Category', [&$this->quizTable, &$this->quizCategoriesTable]);
 		$this->usersTable = new \Ninja\DatabaseTable($pdo, 'user', 'id', '\Raldb\Entity\User', [&$this->quizTable]);
 		$this->quizTable = new \Ninja\DatabaseTable($pdo, 'quiz', 'id', '\Raldb\Entity\Quiz', [&$this->usersTable, &$this->quizCategoriesTable]);
 		$this->quizCategoriesTable = new \Ninja\DatabaseTable($pdo, 'quiz_category', 'categoryId');
		$this->authentication = new \Ninja\Authentication($this->usersTable, 'email', 'password');
	}
	//11/07/18 - AK - directory for information that gets displayed with the layout 
	public function getRoutes(): array {
		$quizController = new \Raldb\Controllers\Quiz($this->quizTable, $this->usersTable, $this->categoriesTable, $this->quizCategoriesTable, $this->authentication); 
		$userController = new \Raldb\Controllers\Register($this->usersTable);
		$loginController = new \Raldb\Controllers\Login($this->authentication);
        $categoryController = new \Raldb\Controllers\Category($this->categoriesTable, $this->quizCategoriesTable); 
	
		$routes = [
			'user/register' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $userController,
					'action' => 'registerUser'
				]
			],
			'user/success' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'success'
				]
			],
			'user/permissions' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'permissions'
				],
				'POST' => [
					'controller' => $userController,
					'action' => 'savePermissions'
				],
				'login' => true,
				'permissions' => \Raldb\Entity\User::EDIT_USER_ACCESS  
			],
			'user/list' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'list'
				],
				'login' => true,
				'permissions' => \Raldb\Entity\User::EDIT_USER_ACCESS
			],
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'login/permissionserror' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'permissionsError'
				]
			],
			'login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
			],
			'category/edit' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $categoryController,
					'action' => 'edit'
				],
				'login' => true,
				'permissions' => \Raldb\Entity\User::EDIT_CATEGORIES 
			],
			'category/delete' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'delete'
				],
				'login' => true,
				'permissions' => \Raldb\Entity\User::REMOVE_CATEGORIES
			],
			'category/list' => [
				'GET' => [
					'controller' => $categoryController,
					'action' => 'list'
				],
				'login' => true,
				'permissions' => \Raldb\Entity\User::EDIT_CATEGORIES
			],
			'quiz/edit' => [
				'POST' => [
					'controller' => $quizController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $quizController,
					'action' => 'edit'
				],
				'login' => true
			],
			'quiz/delete' => [
				'POST' => [
					'controller' => $quizController,
					'action' => 'delete'
				],
				'login' => true
			],
			'quiz/list' => [
				'GET' => [
					'controller' => $quizController,
					'action' => 'list'
				],
				'login' => true
			],
			'quiz/take' => [
				'GET' => [
					'controller' => $quizController,
					'action' => 'takeQuiz'
				],
				'login' => true
			],
			'' => [
				'GET' => [
					'controller' => $quizController,
					'action' => 'home'
				]
			],
			'about' => [
				'GET' => [
					'controller' => $quizController,
					'action' => 'about'
				]
			],
			'qa' => [
				'GET' => [
					'controller' => $quizController,
					'action' => 'qa'
				]
			],
			'contact' => [
				'GET' => [
					'controller' => $quizController,
					'action' => 'contact'
				]
			]
		];

		return $routes;
	}
	//11/07/18 - AK - get authentification for the user 
	public function getAuthentication(): \Ninja\Authentication {   
		return $this->authentication;
	}
	//11/07/18 - AK - check the permission of the user
	public function checkPermission($permission): bool {  
		$user = $this->authentication->getUser();

		if ($user && $user->hasPermission($permission)) {
			return true;
		} else {
			return false;
		}
	}

}
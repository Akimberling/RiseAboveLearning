<?php
namespace Raldb\Controllers;
use \Ninja\DatabaseTable;

class Register {
	private $usersTable;

	public function __construct(DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
	}

	//11/07/18 - AK - Got to the register form
	public function registrationForm() {
		return ['template' => 'register.html.php',
				'title' => 'Register an account'];
	}

	//11/07/18 - AK - show that registration was a success
	public function success() {
		return ['template' => 'registersuccess.html.php',
			    'title' => 'Registration Successful'];
	}


//11/07/18 - AK - input the following to register and if said registration isnt filled out properly show an error
	public function registerUser() {

		$user =  $_POST['user'];

		$valid = true;
		$errors = [];

		if (empty($user['fname'])) {
			$valid = false;
			$errors[] = 'First name cannot be blank';
		}

		if (empty($user['lname'])) {
			$valid = false;
			$errors[] = 'Last name cannot be blank';
		}

		if (empty($user['email'])) {
			$valid = false;
			$errors[] = 'Email cannot be blank';
		}
		else if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) == false) {
			$valid = false;
			$errors[] = 'Invalid email address';
		}
		else {
			$user['email'] = strtolower($user['email']);

			if (count($this->usersTable->find('email', $user['email'])) > 0) {
				$valid = false;
				$errors[] = 'That email address is already registered';
			}
		}


		if (empty($user['password'])) {
			$valid = false;
			$errors[] = 'Password cannot be blank';
		}

		if ($valid == true) {
			$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

			$this->usersTable->save($user);

            header('Location: index.php?user/success');

		}
		else {
			return ['template' => 'register.html.php',
				    'title' => 'Register an account',
				    'variables' => [
				    	'errors' => $errors,
				    	'user' => $user
				    ]
				   ];
		}
	}
//11/07/18 - AK - grabs the information of all the users 
	public function list() {
		$users = $this->usersTable->findAll();

		return ['template' => 'userlist.html.php',
				'title' => 'User List',
				'variables' => [
						'users' => $users
					]
				];
	}
//11/07/18 - AK - grabs the user permissions
	public function permissions() {

		$user = $this->usersTable->findById($_GET['id']);

		$reflected = new \ReflectionClass('\Raldb\Entity\User');
		$constants = $reflected->getConstants();

		return ['template' => 'permissions.html.php',
				'title' => 'Edit Permissions',
				'variables' => [
						'user' => $user,
						'permissions' => $constants
					]
				];
	}
//11/07/18 - AK - saves the changes made to the user permissions
	public function savePermissions() {
		$user = [
			'id' => $_GET['id'],
			'permissions' => array_sum($_POST['permissions'] ?? [])
		];

		$this->usersTable->save($user);

		header('location: index.php?user/list');
	}
}
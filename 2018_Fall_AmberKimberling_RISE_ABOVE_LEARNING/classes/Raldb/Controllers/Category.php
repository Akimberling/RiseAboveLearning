<?php
namespace Raldb\Controllers;

class Category {
	private $categoriesTable;
    private $quizCategoriesTable;

	public function __construct(\Ninja\DatabaseTable $categoriesTable, \Ninja\DatabaseTable $quizCategoriesTable) {
		$this->categoriesTable = $categoriesTable;
		$this->quizCategoriesTable = $quizCategoriesTable;
	}

	public function edit() {

		if (isset($_GET['id'])) {
			$category = $this->categoriesTable->findById($_GET['id']);
		}

		$title = 'Edit Category';

		return ['template' => 'editcategory.html.php',
				'title' => $title,
				'variables' => [
					'category' => $category ?? null
				]
		];
	}

	public function saveEdit() {
		$category = $_POST['category'];

		$this->categoriesTable->save($category);

		header('location: index.php?category/list'); 
	}

	public function list() {
		$categories = $this->categoriesTable->findAll();

		$title = 'Quiz Categories';

		return ['template' => 'categories.html.php', 
			'title' => $title, 
			'variables' => [
			    'categories' => $categories
			  ]
		];
	}
	
	
	public function delete() {
		$this->quizCategoriesTable->delete($_POST['id']); 
		$this->categoriesTable->delete($_POST['id']);  


		header('location: index.php?category/list'); 
	}
}
<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

$work = $db->query("select * from expense_tracker where id = :id", [
  ":id" => $_GET['id']
])->find();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  if (empty($errors)) {
    $db->query("DELETE FROM expense_tracker WHERE id = :id", [
      ':id' => $_POST['_delete_work'],
    ]);

    redirect('/works');
  }
}

view('works/show.view.php', [
  'heading' => 'Work',
  'work' => $work,
  'errors' => $errors,
]);

<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  if (!Validator::string($_POST['name'], 3, 255)) {
    $errors['name'] = 'A name of no more than 255 characters is required.';
  }

  $requiredFields = ['name', 'advance'];
  foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
      $errors[$field] = 'Input cannot be blank.';
    }
  }

  // taxi, labour, food, can be zero if empty
  foreach (['taxi', 'labour', 'food'] as $field_3) {
    if (empty($_POST[$field_3])) {
      $_POST[$field_3] = 0;
    }
  }

  if (empty($_POST['date'])) {
    $errors['date'] = 'Please select a date.';
  }

  if (empty($errors)) {
    $db->query(
      'INSERT INTO expense_tracker (name, advance, taxi, labour, food, date) 
      VALUES (:name, :advance, :taxi, :labour, :food, :date)',
      [
        'name' => $_POST['name'],
        'advance' => $_POST['advance'],
        'taxi' => $_POST['taxi'],
        'labour' => $_POST['labour'],
        'food' => $_POST['food'],
        'date' => $_POST['date'],
      ]
    );

    redirect('/works');
  }
}

view('works/create.view.php', [
  'heading' => 'Create Work',
  'errors' => $errors
]);

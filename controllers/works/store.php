<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if (!Validator::string($_POST['name'], 3, 255)) {
  $errors['name'] = 'A name of no more than 255 characters is required.';
}

$requiredFields = ['name', 'advance'];
foreach ($requiredFields as $field) {
  if (!Validator::required($_POST[$field])) {
    $errors[$field] = 'Input cannot be blank.';
  }
}

foreach (['taxi', 'labour', 'food'] as $field) {
  if (empty($_POST[$field])) {
    $_POST[$field] = 0;
  }
}

if (!Validator::required($_POST['date'])) {
  $errors['date'] = 'Please select a date.';
}

if (empty($_POST['phone'])) {
  $_POST['phone'] = null;
}

if (!empty($errors)) {
  return view('works/create.view.php', [
    'heading' => 'Create Work',
    'errors' => $errors
  ]);
} else {
  $db->query(
    'INSERT INTO expense_tracker (name, advance, taxi, labour, food, date, phone) 
        VALUES (:name, :advance, :taxi, :labour, :food, :date, :phone)',
    [
      ':name' => $_POST['name'],
      ':advance' => $_POST['advance'],
      ':taxi' => $_POST['taxi'],
      ':labour' => $_POST['labour'],
      ':food' => $_POST['food'],
      ':date' => $_POST['date'],
      ':phone' => $_POST['phone'],
    ]
  );

  redirect('/works');
}

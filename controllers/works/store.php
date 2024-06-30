<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$currentUserId = $_SESSION['user']['id'];

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
}

$db->query(
  'INSERT INTO work_details (name, advance, taxi, labour, food, date, phone, user_id) 
   VALUES (:name, :advance, :taxi, :labour, :food, :date, :phone, :user_id)',
  [
    ':name' => $_POST['name'],
    ':advance' => $_POST['advance'],
    ':taxi' => $_POST['taxi'],
    ':labour' => $_POST['labour'],
    ':food' => $_POST['food'],
    ':date' => $_POST['date'],
    ':phone' => $_POST['phone'],
    ':user_id' => $currentUserId
  ]
);

redirect('/works');

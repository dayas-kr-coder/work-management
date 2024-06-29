<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$work = $db->query("select * from work_details where id = :id", [
  ':id' => $_POST['id']
])->findOrFail();

authorize($work['user_id'] === $currentUserId);

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

if (count($errors)) {
  return view('works/edit.view.php', [
    'heading' => 'Edit Work',
    'errors' => $errors,
    'note' => $note
  ]);
}

$db->query(
  'UPDATE work_details 
   SET name = :name, advance = :advance, taxi = :taxi, labour = :labour, food = :food, date = :date, phone = :phone
   WHERE id = :id',
  [
    ':name' => $_POST['name'],
    ':advance' => $_POST['advance'],
    ':taxi' => $_POST['taxi'],
    ':labour' => $_POST['labour'],
    ':food' => $_POST['food'],
    ':date' => $_POST['date'],
    ':phone' => $_POST['phone'],
    ':id' => $_POST['id'],
  ]
);

redirect('/works');

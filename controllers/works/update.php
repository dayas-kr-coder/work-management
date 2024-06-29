<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$work = $db->query("SELECT * FROM work_details WHERE id = :id", [
  ":id" => $_GET['id']
])->find();

if (!$work) {
  abort();
}

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
  foreach (['taxi', 'labour', 'food'] as $field) {
    if (empty($_POST[$field])) {
      $_POST[$field] = 0;
    }
  }

  if (empty($_POST['date'])) {
    $errors['date'] = 'Please select a date.';
  }

  if (empty($_POST['phone'])) {
    $_POST['phone'] = null;
  }

  if (empty($errors)) {
    $db->query(
      'UPDATE work_details SET 
        name = :name,
        advance = :advance,
        taxi = :taxi,
        labour = :labour,
        food = :food,
        phone = :phone,
        date = :date
      WHERE id = :id',
      [
        ':name' => $_POST['name'],
        ':advance' => $_POST['advance'],
        ':taxi' => $_POST['taxi'],
        ':labour' => $_POST['labour'],
        ':food' => $_POST['food'],
        ':phone' => $_POST['phone'],
        ':date' => $_POST['date'],
        ':id' => $_GET['id'],
      ]
    );

    redirect("/work?id=" . $_GET['id']);
  }
}

view('works/update.view.php', [
  'heading' => 'Update Work',
  'work' => $work,
  'errors' => $errors,
]);

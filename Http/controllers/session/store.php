<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\forms\loginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new loginForm();

if (!$form->validate($email, $password)) {
  return view('session/create.view.php', [
    'errors' => $form->errors()
  ]);
}

$user = $db->query("select * from users where email = :email", [
  'email' => $email
])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'id' => $user['id'],
      'email' => $email
    ]);

    redirect('/');
  }
}

return view('session/create.view.php', [
  'errors' => [
    'email' => 'No matching account found for that email address and password.'
  ]
]);

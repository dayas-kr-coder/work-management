<?php

use Core\Authenticator;
use Core\Session;
use Http\forms\loginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new loginForm();

if ($form->validate($email, $password)) {
  if ((new Authenticator())->attempt($email, $password)) {
    redirect('/');
  }

  $form->error('email', 'No matching account found for that email address and password.');
}

Session::flash('errors', $form->errors());
Session::flash('old', [
  'email' => $_POST['email']
]);

redirect('/login');

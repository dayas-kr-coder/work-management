<?php

use Core\Authenticator;
use Http\forms\loginForm;

$form = loginForm::validate($attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
]);

$signedIn = (new Authenticator())->attempt(
  $attributes['email'],
  $attributes['password']
);

if (!$signedIn) {
  $form->error(
    'email',
    'No matching account found for that email address and password.'
  )->throw();
}

redirect('/');

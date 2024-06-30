<?php

namespace Http\forms;

use Core\Validator;

class loginForm
{
  protected $errors = [];

  public function validate($email, $password)
  {

    $errors = [];

    if (!Validator::email($email)) {
      $this->errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::string($password)) {
      $this->errors['password'] = 'please provide a valid password  .';
    }

    return empty($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }
}

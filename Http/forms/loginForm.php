<?php

namespace Http\forms;

use Core\ValidationException;
use Core\Validator;

class loginForm
{
  protected $errors = [];

  public function __construct(public array $attributes)
  {
    $this->attributes = $attributes;

    if (!Validator::email($attributes['email'])) {
      $this->errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::string($attributes['password'])) {
      $this->errors['password'] = 'please provide a valid password  .';
    }
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    ValidationException::throw($this->errors(), $this->attributes);
  }

  public function failed()
  {
    return count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;

    return $this;
  }
}
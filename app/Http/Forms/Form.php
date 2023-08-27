<?php

namespace Http\Forms;

class Form 
{
  protected $errors = [];

  public function getErrors()
  {
    return $this->errors;
  }

  public function addError($field, $message) 
  {
    $this->errors[$field] = $message;
  }
}
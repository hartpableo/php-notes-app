<?php

class Validator 
{
  public static function string($value, $min_length = 1, $max_length = INF)
  {
    $value = trim($value);
    return (strlen($value) >= $min_length && strlen($value) <= $max_length) ? true : false;
  }
}
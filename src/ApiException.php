<?php

namespace TinyRest;

class ApiException extends \Exception
{
  public function __construct($message = "", $code = 0, Throwable $previous = null) {
    if (!$message) {
      $message = "An unspecified error occurred, no failure message was provided.";
    }
    if (!$code) {
      $code = 200;
    }
    $this->message = $message;
    $this->code = $code;
  }
}
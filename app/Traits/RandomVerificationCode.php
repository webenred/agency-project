<?php

namespace App\Traits;

trait RandomVerificationCode
{

  /**
   * generate a alphanumeric random string
   * @return string
   */
  public function generate() : string
  {
    $randomStr = chr(rand(65, 90)) . chr(rand(65, 90)) . rand(1000, 9999);
    $verificationCode = str_shuffle($randomStr);
    return $verificationCode;
  }
}

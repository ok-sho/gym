<?php
namespace Core;

class Validator{
  public static function textVal(string $value, int $min = 1,float $max = INF):bool
  {
    $length=strlen(trim($value));
    return $length >=$min && $length <= $max;
  }
  
  public static function numberVal(string $value, int $minLength, int $maxLength, bool $allowZero=true):bool
  {
    if (!ctype_digit($value)){
      return false;
    }
    $length=strlen(trim($value));
    if ($length < $minLength || $length > $maxLength){
      return false;
    }
    if (!$allowZero && $value[0]=='0'){
      return false;
    }
    return true;
  }

  public static function emailVal(string $value):bool
  {
    return filter_var($value,FILTER_VALIDATE_EMAIL)!==false;
  }

  public static function passwordVal(string $value):bool
  { // check: length
    if (strlen(trim($value)) < 7 || strlen(trim($value)) > 255) {
      return false;
    } // has a number
    if(!preg_match("#[0-9]+#", $value)) {
      return false;    
    } // has capital letter
    if(!preg_match("#[A-Z]+#", $value)) {
      return false;
    } // has lowercase letter
    if(!preg_match("#[a-z]+#", $value)) {
      return false;
    } // has special character
    if(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $value)) {
      vdd($value);
      return false;
    }
    return true;
  }


}
<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Integer implements Rule
{
  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    if($value<=1){
      return false;
    }
    return true;
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
      return '"a" should be an integer & greater than 1';
  }
}

<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class Prime implements Rule
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
    for ($i = 2; $i <= $value/2; $i++){
      if ($value % $i == 0){
        return false;
      }
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
      return ':attribute is not a prime number.';
  }
    // public function __invoke($attribute, $value, $fail)
    // {
    //
    //   for ($i = 2; $i <= $value/2; $i++){
    //     if ($value % $i == 0){
    //       $fail(':attribute is not a prime number.');
    //       break;
    //     }
    //       }
    //     // if (strtoupper($value) !== $value) {
    //     //     $fail('The :attribute must be uppercase.');
    //     // }
    // }
}

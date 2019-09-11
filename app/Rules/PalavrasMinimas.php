<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PalavrasMinimas implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //O campo deve possuir mais de uma palavra
         if(count(explode(' ', $value)) > 1){
            return true;
         }
    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O campo :attribute deve possuir pelo menos 2 palavras.';
    }
}

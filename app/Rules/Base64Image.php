<?php

namespace App\Rules;

use App\Helpers\Base64ValidationRule;
use Illuminate\Contracts\Validation\Rule;

class Base64Image implements Rule
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
        return Base64ValidationRule::validate_base64($value, ['png', 'jpg', 'jpeg']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Image type is not supported.';
    }
}

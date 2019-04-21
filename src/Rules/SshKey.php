<?php

namespace Slashism\LaravelValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Check if a string is a valid SSH key
 */
class SshKey implements Rule
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
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $parts = explode(' ', $value, 3);
        if (count($parts) < 2 || count($parts) > 3) {
            return false;
        }

        $algorithm = $parts[0];
        $key = $parts[1];
        if (!in_array($algorithm, ['ssh-rsa', 'ssh-dss'])) {
            return false;
        }

        if (base64_decode($key, true) == FALSE) {
            return false;
        }

        $decoded = base64_decode(substr($key, 0, 16));
        $check = preg_replace("/[^\w\-]/", "", $decoded);
        if ((string)$check !== (string)$algorithm) {
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
        return 'The :attribute should be a valid ssh key.';
    }
}

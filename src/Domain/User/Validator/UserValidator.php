<?php

namespace App\Domain\User\Validator;

use App\Domain\User\Model\User;
use Selective\Validation\ValidationResult;

/**
 * Validator.
 */
final class UserValidator
{
    /**
     * Validate.
     *
     * @param User $user The user
     *
     * @return ValidationResult The validation result
     */
    public function validateUser(User $user): ValidationResult
    {
        $validation = new ValidationResult();

        if (empty($user->username)) {
            $validation->addError('username', __('Input required'));
        }

        if (empty($user->email)) {
            $validation->addError('email', __('Input required'));
        } elseif (filter_var($user->email, FILTER_VALIDATE_EMAIL) === false) {
            $validation->addError('email', __('Invalid email address'));
        }

        return $validation;
    }
}
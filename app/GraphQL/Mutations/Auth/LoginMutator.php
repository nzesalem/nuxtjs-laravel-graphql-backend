<?php

namespace App\GraphQL\Mutations\Auth;

use App\Exceptions\RuntimeValidationException;

class LoginMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password']
        ];

        $token = auth()->attempt($credentials);

        if (! $token) {
            throw new RuntimeValidationException(
                'Email or password is incorrect',
                'InvalidCredentials'
            );
        }

        return [
            'token' => $token,
            'expiresIn' => auth()->factory()->getTTL() * 60
        ];
    }
}

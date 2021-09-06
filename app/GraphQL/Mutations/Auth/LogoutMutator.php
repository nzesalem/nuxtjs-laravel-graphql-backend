<?php

namespace App\GraphQL\Mutations\Auth;

class LogoutMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return auth()->logout();
    }
}

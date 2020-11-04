<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'country_id' => ['nullable', 'string', 'max:255'],
            // 'state_id' => ['nullable', 'string', 'max:255'],
            // 'city_id' => ['nullable', 'string', 'max:255'],
            // 'lga_id' => ['nullable', 'string', 'max:255'],
            // 'address' => ['nullable', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();


        return User::create([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'email' => $input['email'],
            'role' => $input['role'] == 0 ? 0 : 1,
            'password' => Hash::make($input['password']),
        ]);
    }
}

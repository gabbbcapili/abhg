<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'username' => ['required', 'string', 'alpha_dash', 'max:15', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        $user = User::create([
            'username' => $input['username'],
            'first_name' => ucfirst($input['first_name']),
            'last_name' => ucfirst($input['last_name']),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $card = $user->card()->create([
            'name' => $input['username'],
        ]);

        $contact = $user->contact()->create([
        ]);

        $page_home = $card->pages()->create([
            'name' => 'Home',
            'editable' => 0,
            'url' => 'home',
            'sort' => 0,
        ]);

        $page_bio = $card->pages()->create([
            'name' => 'Bio Page',
            'editable' => 0,
            'url' => 'bio_page',
            'sort' => 1,
        ]);
        return $user;
    }
}

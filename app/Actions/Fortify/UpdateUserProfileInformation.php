<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'current_password' => ['required', function($attribute, $value, $fail) use ($user) {
                // Memeriksa password sesuai dengan password yang ada pada database
                if(!Hash::check($value, $user->password)) {
                    $fail('The current password is invalid.');
                }
            }]
        ])->validateWithBag('updateProfileInformation');

            //menambahkan variabel email perubahan dari inputan email
        $emailChanged = $input['email'] !== $user->email;

        if ($emailChanged && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
            return redirect()->route('verification.notice');
        // } else {
        }
        // jika email tidak berubah, perbarui data pengguna tanpa mengubah email_verified_at
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
        ])->save();
        return back()->with('status', 'Profile was updated.');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        // Log::info("Email verification reset for user: {$user->email}");

        $user->sendEmailVerificationNotification();
    }
}

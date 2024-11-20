<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\PasswordResetLinkSent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\PasswordResetResponse;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Responses\SimpleViewResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menggunakan Fortify untuk mengatur cara pembuatan pengguna baru
        Fortify::createUsersUsing(CreateNewUser::class);

        // Menggunakan Fortify untuk mengatur cara memperbarui informasi profil pengguna
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);

        // Menggunakan Fortify untuk mengatur cara memperbarui kata sandi pengguna
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);

        // Menggunakan Fortify untuk mengatur cara mereset kata sandi pengguna
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        /// Menggunakan Fortify untuk mengatur cara mengirimkan tautan reset kata sandi pengguna
        // Fortify::verifyEmail();

        // Menentukan tampilan untuk halaman login
        Fortify::loginView(function() {
            return view ('auth.login');
        });

        // Menentukan tampilan untuk halaman pendaftaran
        Fortify::registerView(function() {
            return view ('auth.register');
        });


        // Menentukan tampilan untuk halaman permintaan reset kata sandi
        Fortify::requestPasswordResetLinkView(function() {
            return view ('auth.forgot-password');
        });

        // Menentukan tampilan untuk halaman reset kata sandi
        Fortify::resetPasswordView(function($request) {
            return view ('auth.reset-password', ['request'=>$request]);
        });

        // Menentukan tampilan untuk halaman verifikasi email
        Fortify::verifyEmailView(function() {
            return view ('auth.verify-email');
        });

        // Mengatur cara autentikasi pengguna
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        // Mendengarkan event login untuk mengalihkan pengguna ke dashboard setelah login
        Event::listen(Login::class, function ($event) {
            return redirect(route('tasks.dashboard'));
        });

        // Mendengarkan event registrasi untuk mengirimkan notifikasi verifikasi email
        Event::listen(Registered::class, function ($event) {
            // return redirect(route('tasks.dashboard'));
            // mengirim notifikasi verifikasi email kepada pengguna yang baru daftar();
            $event->user->sendEmailVerificationNotification();
        });

        // Mengatur limitasi untuk permintaan login
        RateLimiter::for('login', function (Request $request) {
            // Membuat kunci throttle berdasarkan username/email dan IP pengguna
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        // Mengatur limitasi untuk permintaan autentikasi dua faktor
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Mengatur respon untuk tampilan verifikasi email
        $this->app->singleton(VerifyEmailViewResponse::class, function () {
            return new SimpleViewResponse('auth.verify-email');
        });
    }
}

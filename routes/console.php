<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

Artisan::command('radbet365:about', function () {
    $this->comment('radbet365 — virtual points entertainment platform.');
})->purpose('Display project information');

Artisan::command('radbet365:make-admin {email}', function (string $email) {
    $user = User::query()->where('email', $email)->first();
    if (! $user) {
        $this->error('No account found for that email. Register the account first.');
        return 1;
    }
    $user->forceFill(['is_admin' => true])->save();
    $this->info('Admin access enabled for '.$user->email);
    return 0;
})->purpose('Grant administrator access to an existing account');

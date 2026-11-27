<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('radbet365:about', function () {
    $this->comment('radbet365 — virtual points entertainment platform.');
})->purpose('Display project information');

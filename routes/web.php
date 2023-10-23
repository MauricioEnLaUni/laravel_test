<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any?}', function ($any = null) {
    if ($any && !str_starts_with($any, 'admin')) {
        return redirect('/admin/');
    } elseif(!$any) {
        return redirect("/admin");
    }
})->where('any', '.*');

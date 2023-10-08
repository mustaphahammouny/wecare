<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function update(string $locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}

<?php

namespace App\Modules\MADJUO360\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('MADJUO360::home');
    }
}

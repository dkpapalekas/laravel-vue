<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller {
    public function app(Request $request): View {
        return view('welcome');
    }
}

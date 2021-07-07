<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller {
    public function index(Request $r) {
        $x = new User();
        $x->name = $r->name;
        $x->email = $r->email;
        $x->password = $r->password;
        $x->save();
        return $x;
    }

    public function show(Request $r) {
        $user = User::id(1)->get();
        return $this->json($user);
    }
}

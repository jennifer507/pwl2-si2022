<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;

class HomeController extends Controller
{
    public function dashboard()
{

    $Checkouts = Checkout::with('camp')->where('user_id',auth::id())->get();
    return view('user.dashboard', [
        "checkouts" => $Checkouts
    ]);
}
}

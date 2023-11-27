<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\User\Checkout\Store;
use App\Models\Checkout;
use App\Models\Camp;
use App\Models\User;
use Auth;
use Mail;
use App\Mail\Checkout\AfterCheckout;

class CheckoutController extends Controller
{
    public function create(Camp $camp)
    {
        return view('checkout.create', [
            "camp" => $camp
        ]);
    }

    public function store(Store $request, Camp $camp)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['camp_id'] = $camp->id; // Correct variable name

            $user = Auth::user();
            $user->email = $data['email'];
            $user->occupation = $data['occupation'];
            $user->save();

            $checkout = Checkout::create($data);
            Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));
        
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $ex->getMessage()]);
        }
        return redirect(route('checkout.success'));
    }

    public function success()
    {
        return view('checkout.success');
    }
}

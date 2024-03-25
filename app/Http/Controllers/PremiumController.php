<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        if($user->subscribed('premium')) {
            return $user->redirectToBillingPortal();
        }




        return $user->newSubscription('premium','price_1OjknlGyNbNVrnEZExV7Vebj')->checkout()->redirect();
    }
}

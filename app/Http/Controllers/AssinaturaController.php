<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class AssinaturaController extends Controller
{
    public function __invoke()
    {
        $user_id = auth()->user()->id;
        $tenant_id = User::find($user_id)->tenant_id;
        $tenant = Tenant::find($tenant_id);
        $tenant->test_date_end = null;
        $tenant->save();

        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        if($user->subscribed('default')) {
            return $user->redirectToBillingPortal();
        }
        return $user->newSubscription('default','price_1OjZ7TGyNbNVrnEZqXFEeqzu')->checkout()->redirect();
    }

    public function intermediario()
    {
        $user_id = auth()->user()->id;
        $tenant_id = User::find($user_id)->tenant_id;
        $tenant = Tenant::find($tenant_id);
        $tenant->test_date_end = null;
        $tenant->save();
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        if($user->subscribed('premium')) {
            return $user->redirectToBillingPortal();
        }
        return $user->newSubscription('premium','price_1OqehCGyNbNVrnEZYEKo8EtN')->checkout()->redirect();

    }

    public function empresarial()
    {
        $user_id = auth()->user()->id;
        $tenant_id = User::find($user_id)->tenant_id;
        $tenant = Tenant::find($tenant_id);
        $tenant->test_date_end = null;
        $tenant->save();

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        if($user->subscribed('business')) {
            return $user->redirectToBillingPortal();
        }

        return $user->newSubscription('business', 'price_1OqeiwGyNbNVrnEZXC13WwIq')
            ->checkout()
            ->redirect();
    }


    public function listarPlanos()
    {
        return view('planos.index');
    }







}

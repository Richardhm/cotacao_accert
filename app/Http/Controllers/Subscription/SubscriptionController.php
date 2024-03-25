<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth']);
    }
    public function index()
    {

//        if(auth()->user()->subscribed('default')) {
//            return redirect()->route('subscriptions.premium');
//        }
//
//
        return view('subscriptions.index',[
            //'intent' => auth()->user()->createSetupIntent(),
            //'plan' => session('plan')
        ]);

        //return view('subscriptions.index');




    }




    public function store(Request $request)
    {
        //$plan = session('plan');
//        $request->user()
//            ->newSubscription('default',$plan->stripe_id)
//            ->create($request->token);
        $request->user()
        ->newSubscription('default','price_1OjZ7TGyNbNVrnEZqXFEeqzu')
        ->create($request->token);



        return redirect()->route('subscriptions.premium');

    }

    public function premium()
    {
        return view('subscriptions.premium');
    }

    public function account()
    {
        $invoices = auth()->user()->invoices();
        return view('subscriptions.account',compact('invoices'));
    }

    public function invoiceDownload($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId,[
            'vendor' => 'BmSys',
            'product' => 'Assinatura Mensal'
        ]);
    }

    public function cancel()
    {

        auth()->user()->subscription('default')->cancel();
        return redirect()->route('subscriptions.account');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();
        return redirect()->route('subscriptions.account');
    }


}

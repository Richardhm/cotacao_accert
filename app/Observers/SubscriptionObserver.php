<?php

namespace App\Observers;

use App\Models\Subscription;

use App\Models\Subscriptions;
use App\Models\Tenant;
use App\Models\User;

class SubscriptionObserver
{
    /**
     * Handle the Subscription "created" event.
     */
    public function created(Subscriptions $subscription): void
    {

        $user_id = auth()->user()->id;
        $tenant_id = User::find($user_id)->tenant_id;

        $tenant = Tenant::find($tenant_id);

        $tenant->test_date_end = null;
        $tenant->save();
    }

    /**
     * Handle the Subscription "updated" event.
     */
    public function updated(Subscription $subscription): void
    {
        //
    }

    /**
     * Handle the Subscription "deleted" event.
     */
    public function deleted(Subscription $subscription): void
    {
        //
    }

    /**
     * Handle the Subscription "restored" event.
     */
    public function restored(Subscription $subscription): void
    {
        //
    }

    /**
     * Handle the Subscription "force deleted" event.
     */
    public function forceDeleted(Subscription $subscription): void
    {
        //
    }
}

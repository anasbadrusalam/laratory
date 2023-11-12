<?php

namespace App\Observers;

use App\Models\In;

class InObserver
{
    /**
     * Handle the In "created" event.
     */
    public function created(In $in): void
    {
        //
    }

    /**
     * Handle the In "updated" event.
     */
    public function updated(In $in): void
    {
        //
    }

    /**
     * Handle the In "deleted" event.
     */
    public function deleting(In $in): void
    {
        $in->items()->delete();
    }
    
    /**
     * Handle the In "deleted" event.
     */
    public function deleted(In $in): void
    {
        // $in->items()->delete();
    }

    /**
     * Handle the In "restored" event.
     */
    public function restored(In $in): void
    {
        //
    }

    /**
     * Handle the In "force deleted" event.
     */
    public function forceDeleted(In $in): void
    {
        //
    }
}

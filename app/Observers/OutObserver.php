<?php

namespace App\Observers;

use App\Models\Out;

class OutObserver
{
    /**
     * Handle the Out "created" event.
     */
    public function created(Out $out): void
    {
        //
    }

    /**
     * Handle the Out "updated" event.
     */
    public function updated(Out $out): void
    {
        //
    }

    /**
     * Handle the In "deleting" event.
     */
    public function deleting(Out $out): void
    {
        foreach ($out->items as $item) {
            $item->delete();
        }
    }

    /**
     * Handle the Out "deleted" event.
     */
    public function deleted(Out $out): void
    {
        //
    }

    /**
     * Handle the Out "restored" event.
     */
    public function restored(Out $out): void
    {
        //
    }

    /**
     * Handle the Out "force deleted" event.
     */
    public function forceDeleted(Out $out): void
    {
        //
    }
}

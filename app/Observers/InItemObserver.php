<?php

namespace App\Observers;

use App\Models\InItem;

class InItemObserver
{
    /**
     * Handle the InItem "created" event.
     */
    public function created(InItem $inItem): void
    {
        $inItem->item->update([
            'quantity' =>  $inItem->item->quantity + $inItem->quantity
        ]);
    }

    /**
     * Handle the InItem "updated" event.
     */
    public function updated(InItem $inItem): void
    {
        if ($inItem->isDirty('quantity')) {
            $inItem->item->update([
                'quantity' =>  $inItem->item->quantity + $inItem->quantity - $inItem->getOriginal('quantity')
            ]);
        }
    }

    /**
     * Handle the In "deleting" event.
     */
    public function deleting(InItem $inItem): void
    {
        $inItem->item->update([
            'quantity' =>  $inItem->item->quantity - $inItem->quantity
        ]);
    }

    /**
     * Handle the InItem "deleted" event.
     */
    public function deleted(InItem $inItem): void
    {
        //
    }

    /**
     * Handle the InItem "restored" event.
     */
    public function restored(InItem $inItem): void
    {
        //
    }

    /**
     * Handle the InItem "force deleted" event.
     */
    public function forceDeleted(InItem $inItem): void
    {
        //
    }
}

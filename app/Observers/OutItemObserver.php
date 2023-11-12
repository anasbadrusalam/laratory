<?php

namespace App\Observers;

use App\Models\OutItem;

class OutItemObserver
{
    /**
     * Handle the OutItem "created" event.
     */
    public function created(OutItem $outItem): void
    {
        $outItem->item->update([
            'quantity' =>  $outItem->item->quantity - $outItem->quantity
        ]);
    }

    /**
     * Handle the OutItem "updated" event.
     */
    public function updated(OutItem $outItem): void
    {
        if ($outItem->isDirty('quantity')) {
            $outItem->item->update([
                'quantity' =>  $outItem->item->quantity - $outItem->quantity + $outItem->getOriginal('quantity')
            ]);
        }
    }

    /**
     * Handle the In "deleting" event.
     */
    public function deleting(OutItem $outItem): void
    {
        $outItem->item->update([
            'quantity' =>  $outItem->item->quantity + $outItem->quantity
        ]);
    }

    /**
     * Handle the OutItem "deleted" event.
     */
    public function deleted(OutItem $outItem): void
    {
        //
    }

    /**
     * Handle the OutItem "restored" event.
     */
    public function restored(OutItem $outItem): void
    {
        //
    }

    /**
     * Handle the OutItem "force deleted" event.
     */
    public function forceDeleted(OutItem $outItem): void
    {
        //
    }
}

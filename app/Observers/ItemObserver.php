<?php

namespace App\Observers;

use App\Models\Item;
use App\Models\Notification;

class ItemObserver
{
    /**
     * Handle the Item "created" event.
     */
    public function created(Item $item): void
    {
        Notification::create(['message' => 'New item added: ' . $item->name]);
    }

    /**
     * Handle the Item "updated" event.
     */
    public function updated(Item $item): void
    {
        Notification::create(['message' => 'Item updated: ' . $item->name]);
    }

    /**
     * Handle the Item "deleted" event.
     */
    public function deleted(Item $item): void
    {
        //
    }

    /**
     * Handle the Item "restored" event.
     */
    public function restored(Item $item): void
    {
        //
    }

    /**
     * Handle the Item "force deleted" event.
     */
    public function forceDeleted(Item $item): void
    {
        //
    }
}

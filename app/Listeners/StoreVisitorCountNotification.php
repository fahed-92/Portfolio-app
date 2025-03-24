<?php

namespace App\Listeners;

use App\Events\VisitorCountUpdated;
use App\Models\Admin;
use App\Notifications\VisitorCountIncreased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreVisitorCountNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\VisitorCountUpdated  $event
     * @return void
     */
    public function handle(VisitorCountUpdated $event)
    {
        $admin = Admin::first(); // Adjust as needed to target the correct admin

        if ($admin) {
            $admin->notify(new VisitorCountIncreased($event->visitorCount));
        }
    }
}

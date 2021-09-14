<?php

namespace App\Listeners;

use App\Events\ComplaintProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendComplaintNotification
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
     * @param  ComplaintProcessed  $event
     * @return void
     */
    public function handle(ComplaintProcessed $event)
    {
        return $event;
    }
}

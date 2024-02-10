<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
    
        // Get users with role 'super_admin'
        $users = User::where('role', 'super_admin')->get();
    
        // Send notification to each super_admin user
        foreach ($users as $user) {
            $user->notify(new OrderCreatedNotification($order));
        }
    }
}

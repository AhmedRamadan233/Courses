<?php

namespace App\Notifications;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\MainCategory;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database' ];

    
        // $channels = ['database'];
        // if ($notifiable->notification_prefrences['order_created']['sms'] ?? false){
        //     $channels[] = 'vonage';
        // }
        // if ($notifiable->notification_prefrences['order_created']['mail'] ?? false){
        //     $channels[] = 'mail';
        // }
        // if ($notifiable->notification_prefrences['order_created']['broadcast'] ?? false){
        //     $channels[] = 'broadcast';
        // }
        // return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
     
        return (new MailMessage)
            ->subject("New Order Created")
            ->greeting("Hello")
            ->line("New order has been created")
            ->action('View Order', url('/dashboard'))
            ->line('Thank you for using our application!');
    }




    public function toDatabase($notifiable)
    {
        // $courseName = $this->order->finishingOrder;
        return [
            'body' => "New order has been created",
            'icon' => 'lni lni-envelope',
            'url' =>  url('/dashboard'),
            'order_id' => $this->order->id,
        ];  
    }



    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'body' => "New order has been created ",
            'icon' => 'fas fa-file',
            'url' =>  url('/dashboard'),
            'order_id' => $this->order->id,

        ]);
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class PaymentRecived extends Notification
{
    use Queueable;


    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Payment Was Received.')
            ->greeting('Welcome to ' . env('APP_NAME'))
            ->line('Thank you for using our application!')
            ->action('Login', url('/login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return ["Your Payment has been processed at: " . now()];
    }


    public function toSlack($notifiable)
    {
        $url = url('/exception/');
        return (new SlackMessage)
            ->error()
            ->from('Mr X System', ':ghost:')
            ->to('#payment_status')
            ->content($notifiable->name . '::Payment of 200 paid.')
            ->attachment(function ($attachment) use ($url) {
                $attachment->title('Important: Payment Pending', $url)
                    ->content('Amount withheld at Commbank.');
            });
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
            ->content('Dear' . $notifiable->name . 'Your Payment of $400 received. Thank You');
    }

}

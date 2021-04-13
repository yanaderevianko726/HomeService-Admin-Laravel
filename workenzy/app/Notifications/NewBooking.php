<?php
/*
 * File name: NewBooking.php
 * Last modified: 2021.03.08 at 18:10:37
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Notifications;

use App\Models\Booking;
use Benwilkins\FCM\FcmMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBooking extends Notification
{
    use Queueable;
    /**
     * @var Booking
     */
    private $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        //
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'fcm'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toFcm($notifiable): FcmMessage
    {
        $message = new FcmMessage();
        // TODO translate new booking notification
        $notification = [
            'title' => $this->booking->e_provider->name,
            'body' => "New Booking #" . $this->booking->id . " from " . $this->booking->user->name,
            'image' => $this->getEServiceMediaUrl(),
            'click_action' => "FLUTTER_NOTIFICATION_CLICK",
            'id' => '1',
            'status' => 'done',
        ];
        $message->content($notification)->data($notification)->priority(FcmMessage::PRIORITY_HIGH);

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'booking_id' => $this->booking['id'],
        ];
    }

    private function getEServiceMediaUrl(): string
    {
        if ($this->booking->e_service->hasMedia('image')) {
            return $this->booking->e_service->getFirstMediaUrl('image', 'thumb');
        } else {
            return asset('images/image_default.png');
        }
    }
}

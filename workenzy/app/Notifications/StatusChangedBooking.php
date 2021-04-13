<?php
/*
 * File name: StatusChangedBooking.php
 * Last modified: 2021.03.08 at 17:28:46
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Notifications;

use App\Models\Booking;
use Benwilkins\FCM\FcmMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusChangedBooking extends Notification
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
        $notification = [
            'body' => trans('lang.notification_your_booking', ['booking_id' => $this->booking->id, 'booking_status' => $this->booking->bookingStatus->status]),
            'title' => trans('lang.notification_status_changed_booking'),
            'image' => $this->getEServiceMediaUrl(),
        ];
        $data = [
            'click_action' => "FLUTTER_NOTIFICATION_CLICK",
            'sound' => 'default',
            'id' => 'bookings',
            'status' => 'done',
            'message' => $notification,
        ];
        $message->content($notification)->data($data)->priority(FcmMessage::PRIORITY_HIGH);

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
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

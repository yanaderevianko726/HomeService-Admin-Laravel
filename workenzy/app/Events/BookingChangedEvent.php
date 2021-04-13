<?php
/**
 * File name: BookingChangedEvent.php
 * Last modified: 2021.01.02 at 21:11:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $oldStatus;

    public $updatedBooking;

    /**
     * BookingChangedEvent constructor.
     * @param $oldBooking
     * @param $updatedBooking
     */
    public function __construct($oldStatus, $updatedBooking)
    {
        $this->oldStatus = $oldStatus;
        $this->updatedBooking = $updatedBooking;
    }


}

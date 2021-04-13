<?php
/*
 * File name: BookingTest.php
 * Last modified: 2021.01.29 at 23:27:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Models;

use App\Models\Booking;
use App\Models\Coupon;
use App\Models\EService;
use App\Models\Option;
use App\Models\Tax;
use Tests\TestCase;

class BookingTest extends TestCase
{


    public function testGetDurationInHours()
    {
        $booking = new Booking([
            'start_at' => '2021-09-17 11:00:00',
            'ends_at' => '2021-09-17 12:00:00'
        ]);
        $duration = $booking->getDurationInHours();
        $this->assertEquals(1, $duration, 'Duration is 1 hour');

        $booking = new Booking([
            'start_at' => '2021-09-17 09:30:00',
            'ends_at' => '2021-09-17 21:00:00'
        ]);
        $duration = $booking->getDurationInHours();
        $this->assertEquals(11.5, $duration, 'Duration is 11.5 hours');
    }

    public function testGetSubtotal()
    {
        $eService = EService::all()->random();
        $options = Option::all();
        $booking = new Booking([
            'e_service' => $eService,
            'options' => $options,
            'start_at' => '2021-09-17 11:00:00',
            'ends_at' => '2021-09-17 15:00:00'
        ]);
        $subtotal = ((5 * 4) + 159 + 199);
        $this->assertEquals($subtotal, $booking->getSubtotal());
    }

    public function testGetTotal()
    {
        $eService = EService::all()->random();
        $options = Option::all();
        $taxes = Tax::all();
        $coupon = Coupon::find(1);
        $booking = new Booking([
            'taxes' => $taxes,
            'coupon' => $coupon,
            'e_service' => $eService,
            'options' => $options,
            'start_at' => '2021-01-26 17:42:00',
            'ends_at' => '2021-01-26 19:42:00'
        ]);
        $subtotal = ((5 * 2) + 159 + 199);
        dump($booking->getTotal());
        $this->assertEquals($subtotal + 20 + ($subtotal * 0.1) + ($subtotal * 0.23) - 2, $booking->getTotal());
    }
}

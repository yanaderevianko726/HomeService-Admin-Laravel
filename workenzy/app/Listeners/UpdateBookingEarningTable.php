<?php
/**
 * File name: UpdateBookingEarningTable.php
 * Last modified: 2021.01.03 at 10:26:59
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Listeners;

use App\Criteria\Earnings\EarningOfEProviderCriteria;
use App\Repositories\EarningRepository;

/**
 * Class UpdateBookingEarningTable
 * @package App\Listeners
 */
class UpdateBookingEarningTable
{
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EarningRepository $earningRepository)
    {
        //
        $this->earningRepository = $earningRepository;
    }

    /**
     * Handle the event.
     * oldBooking
     * updatedBooking
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->oldStatus != $event->updatedBooking->payment->status) {
            $this->earningRepository->pushCriteria(new EarningOfEProviderCriteria($event->updatedBooking->eservice->eprovider->id));
            $eprovider = $this->earningRepository->first();
            // dd($eprovider);
            $amount = 0;

            // test if booking done
            if (!empty($eprovider)) {
                
                $amount = $event->updatedBooking->eservice['price'];
                
                // TODO check if the price of option included in the price of the eservice

                if ($event->updatedBooking->payment->status == 'Paid') {
                    $eprovider->total_bookings++;
                    $eprovider->total_earning += $amount;
                    $eprovider->admin_earning += ($eprovider->eprovider->admin_commission / 100) * $amount;
                    $eprovider->eprovider_earning += ($amount - $eprovider->admin_earning);
                    $eprovider->additional_fee += $event->updatedBooking->additional_fee;
                    $eprovider->tax += $amount * $event->updatedBooking->tax / 100;
                    $eprovider->save();
                } elseif ($event->oldStatus == 'Paid') {
                    $eprovider->total_bookings--;
                    $eprovider->total_earning -= $amount;
                    $eprovider->admin_earning -= ($eprovider->eprovider->admin_commission / 100) * $amount;
                    $eprovider->eprovider_earning -= $amount - (($eprovider->eprovider->admin_commission / 100) * $amount);
                    $eprovider->additional_fee -= $event->updatedBooking->additional_fee;
                    $eprovider->tax -= $amount * $event->updatedBooking->tax / 100;
                    $eprovider->save();
                }
            }

        }
    }
}

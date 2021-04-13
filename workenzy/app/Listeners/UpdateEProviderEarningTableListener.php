<?php
/*
 * File name: UpdateEProviderEarningTableListener.php
 * Last modified: 2021.03.04 at 12:25:56
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Listeners;

use App\Repositories\EarningRepository;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class UpdateEProviderEarningTableListener
 * @package App\Listeners
 */
class UpdateEProviderEarningTableListener
{
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    /**
     * EarningTableListener constructor.
     */
    public function __construct(EarningRepository $earningRepository)
    {

        $this->earningRepository = $earningRepository;
    }


    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $uniqueInput = ['e_provider_id' => $event->newEProvider->id];
        try {
            $this->earningRepository->updateOrCreate($uniqueInput);
        } catch (ValidatorException $e) {
        }
    }
}

<?php
/*
 * File name: PayPalController.php
 * Last modified: 2021.02.19 at 21:16:19
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use Exception;
use Flash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends ParentBookingController
{
    /**
     * @var ExpressCheckout
     */
    protected $provider;

    public function __init()
    {
        $this->provider = new ExpressCheckout();

    }

    public function index()
    {
        return view('home');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function getExpressCheckout(Request $request)
    {
        // TODO validate input request
        $this->booking = $this->bookingRepository->find($request->get('booking_id'));
        if (!empty($this->booking)) {
            $payPalCart = $this->getCheckoutData();
            try {
                $response = $this->provider->setExpressCheckout($payPalCart);
                if (!empty($response['paypal_link'])) {
                    return redirect($response['paypal_link']);
                } else {
                    Flash::error($response['L_LONGMESSAGE0']);
                }
            } catch (Exception $e) {
                Flash::error("Error processing PayPal payment for your booking :" . $e->getMessage());
            }
        }
        return redirect(route('payments.failed'));
    }

    /**
     * Set cart data for processing payment on PayPal.
     *
     *
     * @return array
     */
    private function getCheckoutData(): array
    {
        $data = [];
        $data['items'][] = [
            'name' => $this->booking->e_service->name,
            'price' => round($this->booking->getTotal(), 2),
            'qty' => 1,
        ];
        $data['total'] = round($this->booking->getTotal(), 2);
        $data['return_url'] = url("payments/paypal/express-checkout-success?booking_id={$this->booking->id}");
        $data['cancel_url'] = url('payments/paypal');
        $data['invoice_id'] = $this->booking->id . '_' . date("Y_m_d_h_i_sa");
        $data['invoice_description'] = $this->booking->hint;
        return $data;
    }

    /**
     * Process payment on PayPal.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function getExpressCheckoutSuccess(Request $request): RedirectResponse
    {
        // todo validate request
        $token = $request->get('token');
        $PayerID = $request->get('PayerID');
        $this->booking = $this->bookingRepository->find($request->get('booking_id'));
        $this->paymentMethodId = 5; // Paypal method

        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);
        $payPalCart = $this->getCheckoutData();

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            // Perform transaction on PayPal
            $paymentStatus = $this->provider->doExpressCheckoutPayment($payPalCart, $token, $PayerID);
            $this->createBooking();

            return redirect(url('payments/paypal'));
        } else {
            Flash::error("Error processing PayPal payment for your booking");
            return redirect(route('payments.failed'));
        }
    }
}

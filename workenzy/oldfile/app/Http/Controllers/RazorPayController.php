<?php


/**
 * File name: RazorPayController.php
 * Last modified: 2020.12.29 at 16:53:52
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Payment;
use App\Models\User;
use App\Repositories\DeliveryAddressRepository;
use Illuminate\Http\Request;
use Flash;
use Razorpay\Api\Api;

class RazorPayController extends ParentBookingController
{

    /**
     * @var Api
     */
    private $api;
    private $currency;
    /** @var DeliveryAddressRepository
     *
     */
    private $deliveryAddressRepo;

    public function __init()
    {
        $this->api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
        $this->currency = setting('default_currency_code', 'INR');
        $this->deliveryAddressRepo = new DeliveryAddressRepository(app());
    }


    public function index()
    {
        return view('welcome');
    }


    public function checkout(Request $request)
    {
        try{
            $user = $this->userRepository->findByField('api_token', $request->get('api_token'))->first();
            $coupon = $this->couponRepository->findByField('code', $request->get('coupon_code'))->first();
            $deliveryId = $request->get('delivery_address_id');
            $deliveryAddress = $this->deliveryAddressRepo->findWithoutFail($deliveryId);
            if (!empty($user)) {
                $this->booking->user = $user;
                $this->booking->user_id = $user->id;
                $this->booking->delivery_address_id = $deliveryId;
                $this->coupon = $coupon;
                $razorPayCart = $this->getBookingData();

                $razorPayBooking = $this->api->order->create($razorPayCart);
                $fields = $this->getRazorPayFields($razorPayBooking, $user, $deliveryAddress);
                //url-ify the data for the POST
                $fields_string = http_build_query($fields);

                //open connection
                $ch = curl_init();

                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/checkout/embedded');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                $result = curl_exec($ch);
                if($result === true){
                    die();
                }
            }else{
                Flash::error("Error processing RazorPay user not found");
                return redirect(route('payments.failed'));
            }
        }catch (\Exception $e){
            Flash::error("Error processing RazorPay payment for your booking :" . $e->getMessage());
            return redirect(route('payments.failed'));
        }
    }


    /**
     * @param int $userId
     * @param int $deliveryAddressId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function paySuccess(Request $request, int $userId, int $deliveryAddressId,string $couponCode = null)
    {
        $data = $request->all();

        $description = $this->getPaymentDescription($data);

        $this->booking->user_id = $userId;
        $this->booking->user = $this->userRepository->findWithoutFail($userId);
        $this->coupon = $this->couponRepository->findByField('code', $couponCode)->first();
        $this->booking->delivery_address_id = $deliveryAddressId;


        if ($request->hasAny(['razorpay_payment_id','razorpay_signature'])) {

            $this->booking->payment = new Payment();
            $this->booking->payment->status = trans('lang.booking_paid');
            $this->booking->payment->method = 'RazorPay';
            $this->booking->payment->description = $description;

            $this->createBooking();

            return redirect(url('payments/razorpay'));
        }else{
            Flash::error("Error processing RazorPay payment for your booking");
            return redirect(route('payments.failed'));
        }

    }

    /**
     * Set cart data for processing payment on PayPal.
     *
     *
     * @return array
     */
    private function getBookingData()
    {
        $data = [];
        $this->calculateTotal();
        $amountINR = $this->total;
        if ($this->currency !== 'INR') {
            $url = "https://api.exchangeratesapi.io/latest?symbols=$this->currency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);
            $amountINR =  $this->total / $exchange['rates'][$this->currency];
        }
        $booking_id = $this->paymentRepository->all()->count() + 1;
        $data['amount'] = (int)($amountINR * 100);
        $data['payment_capture'] = 1;
        $data['currency'] = 'INR';
        $data['receipt'] = $booking_id . '_' . date("Y_m_d_h_i_sa");

        return $data;
    }

    /**
     * @param $razorPayBooking
     * @param User $user
     * @param DeliveryAddress $deliveryAddress
     * @return array
     */
    private function getRazorPayFields($razorPayBooking, User $user, DeliveryAddress $deliveryAddress): array
    {
        $eprovider = $this->booking->user->cart[0]->eservice->eprovider;

        $fields = array(
            'key_id' => config('services.razorpay.key', ''),
            'order_id' => $razorPayBooking['id'],
            'name' => $eprovider->name,
            'description' => count($this->booking->user->cart) ." items",
            'image' => $this->booking->user->cart[0]->eservice->eprovider->getFirstMedia('image')->getUrl('thumb'),
            'prefill' => [
                'name' => $user->name,
                'email' => $user->email,
                'contact' => $user->custom_fields['phone']['value'],
            ],
            'callback_url' => url('payments/razorpay/pay-success',['user_id'=>$user->id,'delivery_address_id'=>$deliveryAddress->id]),

        );

        if (isset($this->coupon)){
            $fields['callback_url'] = url('payments/razorpay/pay-success',['user_id'=>$user->id,'delivery_address_id'=>$deliveryAddress->id, 'coupon_code' => $this->coupon->code]);
        }

        if (!empty($deliveryAddress)) {
            $fields ['notes'] = [
                'delivery_address' => $deliveryAddress->address,
            ];
        }


        if ($this->currency !== 'INR') {
            $fields['display_amount'] = $this->total;
            $fields['display_currency'] = $this->currency;
        }
        return $fields;
    }

    /**
     * @param array $data
     * @return string
     */
    private function getPaymentDescription(array $data): string
    {
        $description = "Id: " . $data['razorpay_payment_id'] . "</br>";
        $description .= trans('lang.booking').": " . $data['razorpay_order_id'];
        return $description;
    }

}

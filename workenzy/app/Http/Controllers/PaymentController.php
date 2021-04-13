<?php
/*
 * File name: PaymentController.php
 * Last modified: 2021.01.17 at 17:32:41
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the Payment.
     *
     * @param PaymentDataTable $paymentDataTable
     * @return Response
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
        return $paymentDataTable->render('payments.index');
    }
}

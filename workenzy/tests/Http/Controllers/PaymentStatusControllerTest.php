<?php
/*
 * File name: PaymentStatusControllerTest.php
 * Last modified: 2021.01.17 at 16:32:35
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers;

use App\Models\PaymentStatus;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class PaymentStatusControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function testIndex()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('paymentStatuses.index'));
        $response->assertSeeTextInOrder(["Payment Statuses", "Payments Statuses List", "Create Payment Status"]);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('paymentStatuses.create'));
        $response->assertSeeTextInOrder(["Payment Statuses Management", "Status", "Order"]);
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $user = TestHelper::getAdmin();
        $paymentStatusId = PaymentStatus::all()->random()->id;
        $response = $this->actingAs($user)
            ->get(route('paymentStatuses.edit', $paymentStatusId));
        $response->assertSeeTextInOrder(["Payment Statuses Management", "Status", "Order"]);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->make();
        $count = PaymentStatus::count();

        $response = $this->actingAs($user)
            ->post(route('paymentStatuses.store'), $paymentStatus->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseCount(PaymentStatus::getModel()->table, $count + 1);
        $this->assertDatabaseHas(PaymentStatus::getModel()->table, [
            'status' => $paymentStatus->status
        ]);
    }

    /**
     * Test Update PaymentStatus
     * @return void
     */
    public function testUpdate()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->make();
        $paymentStatusId = PaymentStatus::all()->random()->id;


        $response = $this->actingAs($user)
            ->put(route('paymentStatuses.update', $paymentStatusId), $paymentStatus->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas(PaymentStatus::getModel()->table, [
            'status' => $paymentStatus->status
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.updated_successfully', ['operator' => __('lang.payment_status')]));
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        $user = TestHelper::getAdmin();
        $paymentStatusId = PaymentStatus::all()->random()->id;
        $response = $this->actingAs($user)
            ->delete(route('paymentStatuses.destroy', $paymentStatusId));
        $response->assertRedirect(route('paymentStatuses.index'));
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.deleted_successfully', ['operator' => __('lang.payment_status')]));
    }

    /**
     * @return void
     */
    public function testDestroyElementNotExist()
    {
        $user = TestHelper::getAdmin();
        $paymentStatusId = 50000; // not exist id
        $response = $this->actingAs($user)
            ->delete(route('paymentStatuses.destroy', $paymentStatusId));
        $response->assertRedirect(route('paymentStatuses.index'));
        $response->assertSessionHas('flash_notification.0.level', 'danger');
        $response->assertSessionHas('flash_notification.0.message', 'Payment Status not found');
    }

    /**
     * @return void
     */
    public function testStatusFieldRequiredWhenStore()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->make();

        $paymentStatus['status'] = null;

        $response = $this->actingAs($user)
            ->post(route('paymentStatuses.store'), $paymentStatus->toArray());
        $response->assertSessionHasErrors("status", __('validation.required', ['attribute' => 'status']));
    }

    /**
     * @return void
     */
    public function testStatusFieldRequiredWhenUpdate()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->make();
        $paymentStatusId = PaymentStatus::all()->random()->id;

        $paymentStatus['status'] = null;

        $response = $this->actingAs($user)
            ->put(route('paymentStatuses.update', $paymentStatusId), $paymentStatus->toArray());
        $response->assertSessionHasErrors("status", __('validation.required', ['attribute' => 'status']));
    }

    /**
     * @return void
     */
    public function testStatusFieldMax127Characters()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->state('status_more_127_char')->make();
        $response = $this->actingAs($user)
            ->post(route('paymentStatuses.store'), $paymentStatus->toArray());
        $response->assertSessionHasErrors("status", __('validation.max.string', ['attribute' => 'status', 'max' => '127']));
    }

    /**
     * @return void
     */
    public function testOrderFieldNumericWhenStore()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->make();

        $paymentStatus['order'] = null;

        $response = $this->actingAs($user)
            ->post(route('paymentStatuses.store'), $paymentStatus->toArray());
        $response->assertSessionHasErrors("order", __('validation.numeric', ['attribute' => 'order']));
    }

    /**
     * @return void
     */
    public function testOrderFieldNumericWhenUpdate()
    {
        $user = TestHelper::getAdmin();
        $paymentStatus = factory(PaymentStatus::class)->make();
        $paymentStatusId = PaymentStatus::all()->random()->id;

        $paymentStatus['order'] = null;

        $response = $this->actingAs($user)
            ->put(route('paymentStatuses.update', $paymentStatusId), $paymentStatus->toArray());
        $response->assertSessionHasErrors("order", __('validation.numeric', ['attribute' => 'order']));
    }

}

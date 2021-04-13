<?php
/*
 * File name: PaymentMethodControllerTest.php
 * Last modified: 2021.01.17 at 16:38:53
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers;

use App\Models\PaymentMethod;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class PaymentMethodControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function testIndex()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('paymentMethods.index'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.payment_method_desc'), __('lang.payment_method_table'), __('lang.payment_method_create')]);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('paymentMethods.create'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.payment_method_desc'), __('lang.payment_method_name'), __('lang.payment_method_order')]);
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $user = TestHelper::getAdmin();
        $paymentMethodId = PaymentMethod::all()->random()->id;
        $response = $this->actingAs($user)
            ->get(route('paymentMethods.edit', $paymentMethodId));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.payment_method_desc'), __('lang.payment_method_name'), __('lang.payment_method_order')]);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $user = TestHelper::getAdmin();
        $paymentMethod = factory(PaymentMethod::class)->make();
        $count = PaymentMethod::count();

        $response = $this->actingAs($user)
            ->post(route('paymentMethods.store'), $paymentMethod->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseCount(PaymentMethod::getModel()->table, $count + 1);
        $this->assertDatabaseHas(PaymentMethod::getModel()->table, [
            'name' => $paymentMethod->name,
            'route' => $paymentMethod->route
        ]);
    }

    /**
     * Test Update PaymentMethod
     * @return void
     */
    public function testUpdate()
    {
        $user = TestHelper::getAdmin();
        $paymentMethod = factory(PaymentMethod::class)->make();
        $paymentMethodId = PaymentMethod::all()->random()->id;


        $response = $this->actingAs($user)
            ->put(route('paymentMethods.update', $paymentMethodId), $paymentMethod->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas(PaymentMethod::getModel()->table, [
            'name' => $paymentMethod->name,
            'route' => $paymentMethod->route,
            'description' => $paymentMethod->description
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.updated_successfully', ['operator' => __('lang.payment_method')]));
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        $user = TestHelper::getAdmin();
        $paymentMethodId = PaymentMethod::all()->random()->id;
        $response = $this->actingAs($user)
            ->delete(route('paymentMethods.destroy', $paymentMethodId));
        $response->assertRedirect(route('paymentMethods.index'));
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.deleted_successfully', ['operator' => __('lang.payment_method')]));
    }

    /**
     * @return void
     */
    public function testDestroyElementNotExist()
    {
        $user = TestHelper::getAdmin();
        $paymentMethodId = 50000; // not exist id
        $response = $this->actingAs($user)
            ->delete(route('paymentMethods.destroy', $paymentMethodId));
        $response->assertRedirect(route('paymentMethods.index'));
        $response->assertSessionHas('flash_notification.0.level', 'danger');
        $response->assertSessionHas('flash_notification.0.message', 'Payment Method not found');
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenStore()
    {
        $user = TestHelper::getAdmin();
        $paymentMethod = factory(PaymentMethod::class)->make();

        $paymentMethod['name'] = null;
        $paymentMethod['description'] = null;
        $paymentMethod['route'] = null;
        $paymentMethod['order'] = null;

        $response = $this->actingAs($user)
            ->post(route('paymentMethods.store'), $paymentMethod->toArray());
        $response->assertSessionHasErrors("name", __('validation.required', ['attribute' => 'name']));
        $response->assertSessionHasErrors("description", __('validation.required', ['attribute' => 'description']));
        $response->assertSessionHasErrors("route", __('validation.required', ['attribute' => 'route']));
        $response->assertSessionHasErrors("order", __('validation.numeric', ['attribute' => 'order']));
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenUpdate()
    {
        $user = TestHelper::getAdmin();
        $paymentMethod = factory(PaymentMethod::class)->make();
        $paymentMethodId = PaymentMethod::all()->random()->id;

        $paymentMethod['name'] = null;
        $paymentMethod['description'] = null;
        $paymentMethod['route'] = null;
        $paymentMethod['order'] = null;


        $response = $this->actingAs($user)
            ->put(route('paymentMethods.update', $paymentMethodId), $paymentMethod->toArray());
        $response->assertSessionHasErrors("name", __('validation.required', ['attribute' => 'name']));
        $response->assertSessionHasErrors("description", __('validation.required', ['attribute' => 'description']));
        $response->assertSessionHasErrors("route", __('validation.required', ['attribute' => 'route']));
        $response->assertSessionHasErrors("order", __('validation.numeric', ['attribute' => 'order']));
    }

    /**
     * @return void
     */
    public function testMaxCharactersFields()
    {
        $user = TestHelper::getAdmin();
        $paymentMethod = factory(PaymentMethod::class)->states(['name_more_127_char', 'description_more_127_char', 'route_more_127_char', 'order_negative'])->make();
        $response = $this->actingAs($user)
            ->post(route('paymentMethods.store'), $paymentMethod->toArray());
        $response->assertSessionHasErrors("name", __('validation.max.string', ['attribute' => 'name', 'max' => '127']));
        $response->assertSessionHasErrors("description", __('validation.max.string', ['attribute' => 'description', 'max' => '127']));
        $response->assertSessionHasErrors("route", __('validation.max.string', ['attribute' => 'route', 'max' => '127']));
        $response->assertSessionHasErrors("order", __('validation.min.numeric', ['attribute' => 'order']));
    }

}

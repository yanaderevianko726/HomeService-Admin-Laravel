<?php
/*
 * File name: EProviderTypeControllerTest.php
 * Last modified: 2021.01.17 at 20:35:46
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers;

use App\Models\EProviderType;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class EProviderTypeControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function testIndex()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('eProviderTypes.index'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.e_provider_type_desc'), __('lang.e_provider_type_table'), __('lang.e_provider_type_create')]);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('eProviderTypes.create'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.e_provider_type_desc'), __('lang.e_provider_type_name'), __('lang.e_provider_type_commission')]);
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $user = TestHelper::getAdmin();
        $eProviderTypeId = EProviderType::all()->random()->id;
        $response = $this->actingAs($user)
            ->get(route('eProviderTypes.edit', $eProviderTypeId));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.e_provider_type_desc'), __('lang.e_provider_type_name'), __('lang.e_provider_type_commission')]);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $user = TestHelper::getAdmin();
        $eProviderType = factory(EProviderType::class)->make();
        $count = EProviderType::count();

        $response = $this->actingAs($user)
            ->post(route('eProviderTypes.store'), $eProviderType->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseCount(EProviderType::getModel()->table, $count + 1);
        $this->assertDatabaseHas(EProviderType::getModel()->table, [
            'name' => $eProviderType->name,
            'commission' => $eProviderType->commission,
            'disabled' => $eProviderType->disabled
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.saved_successfully', ['operator' => __('lang.e_provider_type')]));
    }

    /**
     * Test Update EProviderType
     * @return void
     */
    public function testUpdate()
    {
        $user = TestHelper::getAdmin();
        $eProviderType = factory(EProviderType::class)->make();
        $eProviderTypeId = EProviderType::all()->random()->id;


        $response = $this->actingAs($user)
            ->put(route('eProviderTypes.update', $eProviderTypeId), $eProviderType->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas(EProviderType::getModel()->table, [
            'name' => $eProviderType->name,
            'commission' => $eProviderType->commission,
            'disabled' => $eProviderType->disabled
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.updated_successfully', ['operator' => __('lang.e_provider_type')]));
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        $user = TestHelper::getAdmin();
        $eProviderTypeId = EProviderType::all()->random()->id;
        $response = $this->actingAs($user)
            ->delete(route('eProviderTypes.destroy', $eProviderTypeId));
        $response->assertRedirect(route('eProviderTypes.index'));
        $this->assertDatabaseMissing(EProviderType::getModel()->table, [
            'id' => $eProviderTypeId,
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.deleted_successfully', ['operator' => __('lang.e_provider_type')]));
    }

    /**
     * @return void
     */
    public function testDestroyElementNotExist()
    {
        $user = TestHelper::getAdmin();
        $eProviderTypeId = 50000; // not exist id
        $response = $this->actingAs($user)
            ->delete(route('eProviderTypes.destroy', $eProviderTypeId));
        $response->assertRedirect(route('eProviderTypes.index'));
        $response->assertSessionHas('flash_notification.0.level', 'danger');
        $response->assertSessionHas('flash_notification.0.message', 'E Provider Type not found');
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenStore()
    {
        $user = TestHelper::getAdmin();
        $eProviderType = factory(EProviderType::class)->make();

        $eProviderType['name'] = null;
        $eProviderType['commission'] = null;

        $response = $this->actingAs($user)
            ->post(route('eProviderTypes.store'), $eProviderType->toArray());
        $response->assertSessionHasErrors("name", __('validation.required', ['attribute' => 'name']));
        $response->assertSessionHasErrors("commission", __('validation.numeric', ['attribute' => 'commission']));
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenUpdate()
    {
        $user = TestHelper::getAdmin();
        $eProviderType = factory(EProviderType::class)->make();
        $eProviderTypeId = EProviderType::all()->random()->id;

        $eProviderType['name'] = null;
        $eProviderType['commission'] = null;


        $response = $this->actingAs($user)
            ->put(route('eProviderTypes.update', $eProviderTypeId), $eProviderType->toArray());
        $response->assertSessionHasErrors("name", __('validation.required', ['attribute' => 'name']));
        $response->assertSessionHasErrors("commission", __('validation.numeric', ['attribute' => 'commission']));
    }

    /**
     * @return void
     */
    public function testMaxCharactersFields()
    {
        $user = TestHelper::getAdmin();
        $eProviderType = factory(EProviderType::class)->states(['name_more_127_char', 'commission_more_100'])->make();
        $response = $this->actingAs($user)
            ->post(route('eProviderTypes.store'), $eProviderType->toArray());
        $response->assertSessionHasErrors("name", __('validation.max.string', ['attribute' => 'name', 'max' => '127']));
        $response->assertSessionHasErrors("commission", __('validation.max.numeric', ['attribute' => 'commission']));
    }

    /**
     * @return void
     */
    public function testMinCommissionField()
    {
        $user = TestHelper::getAdmin();
        $eProviderType = factory(EProviderType::class)->states(['commission_less_0'])->make();
        $response = $this->actingAs($user)
            ->post(route('eProviderTypes.store'), $eProviderType->toArray());
        $response->assertSessionHasErrors("commission", __('validation.min.numeric', ['attribute' => 'commission']));
    }

}

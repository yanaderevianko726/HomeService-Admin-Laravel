<?php
/*
 * File name: AwardControllerTest.php
 * Last modified: 2021.01.17 at 20:57:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers;

use App\Models\Award;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class AwardControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function testIndex()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('awards.index'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.award_desc'), __('lang.award_table'), __('lang.award_create')]);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('awards.create'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.award_desc'), __('lang.award_title'), __('lang.award_description')]);
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $user = TestHelper::getAdmin();
        $awardId = Award::all()->random()->id;
        $response = $this->actingAs($user)
            ->get(route('awards.edit', $awardId));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.award_desc'), __('lang.award_title'), __('lang.award_description')]);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $user = TestHelper::getAdmin();
        $award = factory(Award::class)->make();
        $count = Award::count();

        $response = $this->actingAs($user)
            ->post(route('awards.store'), $award->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseCount(Award::getModel()->table, $count + 1);
        $this->assertDatabaseHas(Award::getModel()->table, [
            'title' => $award->title,
            'description' => $award->description,
            'e_provider_id' => $award->e_provider_id
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.saved_successfully', ['operator' => __('lang.award')]));
    }

    /**
     * Test Update Award
     * @return void
     */
    public function testUpdate()
    {
        $user = TestHelper::getAdmin();
        $award = factory(Award::class)->make();
        $awardId = Award::all()->random()->id;


        $response = $this->actingAs($user)
            ->put(route('awards.update', $awardId), $award->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas(Award::getModel()->table, [
            'title' => $award->title,
            'description' => $award->description,
            'e_provider_id' => $award->e_provider_id
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.updated_successfully', ['operator' => __('lang.award')]));
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        $user = TestHelper::getAdmin();
        $awardId = Award::all()->random()->id;
        $response = $this->actingAs($user)
            ->delete(route('awards.destroy', $awardId));
        $response->assertRedirect(route('awards.index'));
        $this->assertDatabaseMissing(Award::getModel()->table, [
            'id' => $awardId,
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.deleted_successfully', ['operator' => __('lang.award')]));
    }

    /**
     * @return void
     */
    public function testDestroyElementNotExist()
    {
        $user = TestHelper::getAdmin();
        $awardId = 50000; // not exist id
        $response = $this->actingAs($user)
            ->delete(route('awards.destroy', $awardId));
        $response->assertRedirect(route('awards.index'));
        $response->assertSessionHas('flash_notification.0.level', 'danger');
        $response->assertSessionHas('flash_notification.0.message', 'Award not found');
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenStore()
    {
        $user = TestHelper::getAdmin();
        $award = factory(Award::class)->make();

        $award['title'] = null;
        $award['e_provider_id'] = null;

        $response = $this->actingAs($user)
            ->post(route('awards.store'), $award->toArray());
        $response->assertSessionHasErrors("title", __('validation.required', ['attribute' => 'title']));
        $response->assertSessionHasErrors("e_provider_id", __('validation.required', ['attribute' => 'e_provider_id']));
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenUpdate()
    {
        $user = TestHelper::getAdmin();
        $award = factory(Award::class)->make();
        $awardId = Award::all()->random()->id;

        $award['title'] = null;
        $award['e_provider_id'] = null;


        $response = $this->actingAs($user)
            ->put(route('awards.update', $awardId), $award->toArray());
        $response->assertSessionHasErrors("title", __('validation.required', ['attribute' => 'title']));
        $response->assertSessionHasErrors("e_provider_id", __('validation.required', ['attribute' => 'e_provider_id']));
    }

    /**
     * @return void
     */
    public function testMaxCharactersFields()
    {
        $user = TestHelper::getAdmin();
        $award = factory(Award::class)->states(['title_more_127_char', 'not_exist_e_provider_id'])->make();
        $response = $this->actingAs($user)
            ->post(route('awards.store'), $award->toArray());
        $response->assertSessionHasErrors("title", __('validation.max.string', ['attribute' => 'title', 'max' => '127']));
        $response->assertSessionHasErrors("e_provider_id", __('validation.exists', ['attribute' => 'e_provider_id']));
    }

}

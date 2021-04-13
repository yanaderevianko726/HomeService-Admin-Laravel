<?php
/*
 * File name: ExperienceControllerTest.php
 * Last modified: 2021.01.18 at 15:57:57
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers;

use App\Models\Experience;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class ExperienceControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function testIndex()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('experiences.index'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.experience_desc'), __('lang.experience_table'), __('lang.experience_create')]);
    }

    /**
     * @return void
     */
    public function testShow()
    {
        $user = TestHelper::getAdmin();
        $experience = Experience::all()->random();
        $response = $this->actingAs($user)
            ->get(route('experiences.show', $experience->id));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([$experience->title, $experience->description], false);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('experiences.create'));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.experience_desc'), __('lang.experience_title'), __('lang.experience_description')]);
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $user = TestHelper::getAdmin();
        $experienceId = Experience::all()->random()->id;
        $response = $this->actingAs($user)
            ->get(route('experiences.edit', $experienceId));
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([__('lang.experience_desc'), __('lang.experience_title'), __('lang.experience_description')]);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $user = TestHelper::getAdmin();
        $experience = factory(Experience::class)->make();
        $count = Experience::count();

        $response = $this->actingAs($user)
            ->post(route('experiences.store'), $experience->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseCount(Experience::getModel()->table, $count + 1);
        $this->assertDatabaseHas(Experience::getModel()->table, [
            'title' => $experience->title,
            'description' => $experience->description,
            'e_provider_id' => $experience->e_provider_id
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.saved_successfully', ['operator' => __('lang.experience')]));
    }

    /**
     * Test Update Experience
     * @return void
     */
    public function testUpdate()
    {
        $user = TestHelper::getAdmin();
        $experience = factory(Experience::class)->make();
        $experienceId = Experience::all()->random()->id;


        $response = $this->actingAs($user)
            ->put(route('experiences.update', $experienceId), $experience->toArray());
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas(Experience::getModel()->table, [
            'title' => $experience->title,
            'description' => $experience->description,
            'e_provider_id' => $experience->e_provider_id
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.updated_successfully', ['operator' => __('lang.experience')]));
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        $user = TestHelper::getAdmin();
        $experienceId = Experience::all()->random()->id;
        $response = $this->actingAs($user)
            ->delete(route('experiences.destroy', $experienceId));
        $response->assertRedirect(route('experiences.index'));
        $this->assertDatabaseMissing(Experience::getModel()->table, [
            'id' => $experienceId,
        ]);
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertSessionHas('flash_notification.0.message', __('lang.deleted_successfully', ['operator' => __('lang.experience')]));
    }

    /**
     * @return void
     */
    public function testDestroyElementNotExist()
    {
        $user = TestHelper::getAdmin();
        $experienceId = 50000; // not exist id
        $response = $this->actingAs($user)
            ->delete(route('experiences.destroy', $experienceId));
        $response->assertRedirect(route('experiences.index'));
        $response->assertSessionHas('flash_notification.0.level', 'danger');
        $response->assertSessionHas('flash_notification.0.message', 'Experience not found');
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenStore()
    {
        $user = TestHelper::getAdmin();
        $experience = factory(Experience::class)->make();

        $experience['title'] = null;
        $experience['e_provider_id'] = null;

        $response = $this->actingAs($user)
            ->post(route('experiences.store'), $experience->toArray());
        $response->assertSessionHasErrors("title", __('validation.required', ['attribute' => 'title']));
        $response->assertSessionHasErrors("e_provider_id", __('validation.required', ['attribute' => 'e_provider_id']));
    }

    /**
     * @return void
     */
    public function testRequiredFieldsWhenUpdate()
    {
        $user = TestHelper::getAdmin();
        $experience = factory(Experience::class)->make();
        $experienceId = Experience::all()->random()->id;

        $experience['title'] = null;
        $experience['e_provider_id'] = null;


        $response = $this->actingAs($user)
            ->put(route('experiences.update', $experienceId), $experience->toArray());
        $response->assertSessionHasErrors("title", __('validation.required', ['attribute' => 'title']));
        $response->assertSessionHasErrors("e_provider_id", __('validation.required', ['attribute' => 'e_provider_id']));
    }

    /**
     * @return void
     */
    public function testMaxCharactersFields()
    {
        $user = TestHelper::getAdmin();
        $experience = factory(Experience::class)->states(['title_more_127_char', 'not_exist_e_provider_id'])->make();
        $response = $this->actingAs($user)
            ->post(route('experiences.store'), $experience->toArray());
        $response->assertSessionHasErrors("title", __('validation.max.string', ['attribute' => 'title', 'max' => '127']));
        $response->assertSessionHasErrors("e_provider_id", __('validation.exists', ['attribute' => 'e_provider_id']));
    }

}

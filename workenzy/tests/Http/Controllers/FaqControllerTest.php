<?php
/*
 * File name: FaqControllerTest.php
 * Last modified: 2021.01.11 at 22:36:51
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers;

use App\Models\Faq;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class FaqControllerTest extends TestCase
{

    /**
     * @return void
     */
    public function testIndex()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('faqs.index'));
        $response->assertSeeTextInOrder(["Faqs Management", "Faqs List", "Create Faq"]);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $user = TestHelper::getAdmin();
        $response = $this->actingAs($user)
            ->get(route('faqs.create'));
        $response->assertSeeTextInOrder(["Faqs Management", "Question", "Answer", "Faq Category"]);
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $user = TestHelper::getAdmin();
        $faqId = Faq::all()->random()->id;
        $response = $this->actingAs($user)
            ->get(route('faqs.edit', $faqId));
        $response->assertSeeTextInOrder(["Faqs Management", "Question", "Answer", "Faq Category"]);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $user = TestHelper::getAdmin();
        $faq = factory(Faq::class)->make();

        $response = $this->actingAs($user)
            ->post(route('faqs.store'), $faq->toArray());
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test Update Faq
     * @return void
     */
    public function testUpdate()
    {
        $user = TestHelper::getAdmin();
        $faq = factory(Faq::class)->make();
        $faqId = Faq::all()->random()->id;

        $response = $this->actingAs($user)
            ->put(route('faqs.update', $faqId), $faq->toArray());
        $response->assertSessionHasNoErrors();
    }

    /**
     * @return void
     */
    public function testDestroy()
    {
        // TODO verify session
        $user = TestHelper::getAdmin();
        $faqId = Faq::all()->random()->id;
        //$faqId = 50000;
        $response = $this->actingAs($user)
            ->delete(route('faqs.destroy', $faqId));
        $response->assertSessionHas("password_hash");
    }

    /**
     * @return void
     */
    public function testQuestionFieldRequired()
    {
        $user = TestHelper::getAdmin();
        $faq = factory(Faq::class)->make();

        $faq['question'] = null;

        $response = $this->actingAs($user)
            ->post(route('faqs.store'), $faq->toArray());
        $response->assertSessionHasErrors("question");
    }

    /**
     * @return void
     */
    public function testAnswerFieldRequired()
    {
        $user = TestHelper::getAdmin();
        $faq = factory(Faq::class)->make();

        $faq['answer'] = null;

        $response = $this->actingAs($user)
            ->post(route('faqs.store'), $faq->toArray());
        $response->assertSessionHasErrors("answer");
    }

    /**
     * @return void
     */
    public function testCategoryFieldRequired()
    {
        $user = TestHelper::getAdmin();

        $faq = factory(Faq::class)->make();
        $faq['faq_category_id'] = null;

        $response = $this->actingAs($user)
            ->post(route('faqs.store'), $faq->toArray());
        $response->assertSessionHasErrors("faq_category_id");
    }

}

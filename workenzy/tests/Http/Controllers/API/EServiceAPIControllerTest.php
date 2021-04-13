<?php
/*
 * File name: EServiceAPIControllerTest.php
 * Last modified: 2021.02.05 at 21:04:54
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace Tests\Http\Controllers\API;

use Illuminate\Http\Response;
use Tests\Helpers\TestHelper;
use Tests\TestCase;

class EServiceAPIControllerTest extends TestCase
{

    public function testShow()
    {

        $response = $this->json('get', 'api/e_services/17');
        $response->assertStatus(200);
    }

    public function testGetEServicesByCategory()
    {
        $queryParameters = [
            'with' => 'eProvider;eProvider.addresses;categories',
            'search' => 'categories.id:4',
            'searchFields' => 'categories.id:=',
        ];

        $response = $this->json('get', 'api/e_services', $queryParameters);
        $data = TestHelper::generateJsonArray(count($response->json('data')), [
            'available' => true,
            'e_provider' => [
                'accepted' => true,
            ]
        ]);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['data' => $data]);
    }

    public function testGetRecommendedEServices()
    {
        $queryParameters = [
            'only' => 'id;name;price;discount_price;price_unit;has_media;media;total_reviews;rate;available',
            'limit' => '6',
        ];

        $response = $this->json('get', 'api/e_services', $queryParameters);
        $data = TestHelper::generateJsonArray(count($response->json('data')), [
            'available' => true,
        ]);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['data' => $data]);
    }

    public function testGetFeaturedEServicesByCategory()
    {
        $queryParameters = [
            'with' => 'eProvider;eProvider.addresses;categories',
            'search' => 'categories.id:4;featured:1',
            'searchFields' => 'categories.id:=;featured:=',
            'searchJoin' => 'and',
        ];

        $response = $this->json('get', 'api/e_services', $queryParameters);
        $data = TestHelper::generateJsonArray(count($response->json('data')), [
            'available' => true,
            'featured' => true,
            'e_provider' => [
                'accepted' => true,
            ]
        ]);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['data' => $data]);
    }

    public function testGetAvailableEServicesByCategory()
    {
        $queryParameters = [
            'with' => 'eProvider;eProvider.addresses;categories',
            'search' => 'categories.id:3',
            'searchFields' => 'categories.id:=',
            'available_e_provider' => 'true'
        ];

        $response = $this->json('get', 'api/e_services', $queryParameters);
        $response->dump();
        $data = TestHelper::generateJsonArray(count($response->json('data')), [
            'available' => true,
            'e_provider' => [
                'available' => true,
                'accepted' => true,
            ]
        ]);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['data' => $data]);
    }

    public function testDestroy()
    {

    }
}

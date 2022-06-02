<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class BlogApiPostTest extends ApiTestCase
{
    public function apiToken(): string
    {
        $user = static::getContainer()->get(UserRepository::class)->findOneBy(['email' => 'r.yazovskii@mail.ru']);
        return $user->getApiToken();
    }

//    public function testApiUsers()
//    {
//        $client = static::createClient();
//        $client->request('GET', '/api/users');
//        $this->assertResponseStatusCodeSame(401);
//        $response = $client->withOptions([
//            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
//        ])->request('GET', '/api/users');
//        $this->assertResponseStatusCodeSame(200);
//        $resultArray = $response->toArray();
//        $this->assertJson($response->getContent());
//        $this->assertIsArray($resultArray);
//    }
//
//    public function testReviews(): void
//    {
//        $client = static::createClient();
//        $client->request('GET', '/api/reviews');
//        $this->assertResponseStatusCodeSame(401);
//        $response = $client->withOptions([
//            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
//        ])->request('GET', '/api/reviews');
//        $this->assertResponseStatusCodeSame(200);
//        $resultArray = $response->toArray();
//        $this->assertJson($response->getContent());
//        $this->assertIsArray($resultArray);
//    }
//
//    public function testProduct(): void
//    {
//        $client = static::createClient();
//        $client->request('GET', '/api/product');
//        $this->assertResponseStatusCodeSame(401);
//        $response = $client->withOptions([
//            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
//        ])->request('GET', '/api/product');
//        $this->assertResponseStatusCodeSame(200);
//        $resultArray = $response->toArray();
//        $this->assertJson($response->getContent());
//        $this->assertIsArray($resultArray);
//    }
//
//    public function testCategories(): void
//    {
//        $client = static::createClient();
//        $client->request('GET', '/api/categories');
//        $this->assertResponseStatusCodeSame(401);
//        $response = $client->withOptions([
//            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
//        ])->request('GET', '/api/categories');
//        $this->assertResponseStatusCodeSame(200);
//        $resultArray = $response->toArray();
//        $this->assertJson($response->getContent());
//        $this->assertIsArray($resultArray);
//    }
}

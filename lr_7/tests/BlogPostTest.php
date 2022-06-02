<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogPostTest extends WebTestCase
{
    private array $trueCredentials = ['username' => 'r.yazovskii@mail.ru', 'password' => 'Roman2001'];
    private array $falseCredentials = ['username' => 'try', 'password' => 'password'];

   public function testHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleContains('Comment.ru');
        $this->assertCount(10, $crawler->filter('.single-blog-area'));
        $link = $crawler->selectLink('Product 9')->link();
        $client->click($link);
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleContains('Comment');
    }

//    public function testLogin(): void
//    {
//        $client = static::createClient();
//        $crawler = $client->request('GET', '/');
//        $link = $crawler->selectLink('Вход')->link();
//        $client->click($link);
//        $this->assertResponseStatusCodeSame(200);
//        $this->assertPageTitleContains('Войти');
//        $client->submitForm('Войти', $this->falseCredentials);
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertSelectorTextContains('.alert.alert-danger', 'Invalid credentials.');
//        $client->submitForm('Войти', $this->trueCredentials);
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertPageTitleContains('Comment.ru');
//    }
//
//    public function testAdding()
//    {
//        $client = static::createClient();
//        $client->request('GET', '/review/new');
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertPageTitleContains('Войти');
//        $client->submitForm('Войти', $this->trueCredentials);
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $review = [
//            'review[text]' => '      ',
//            'review[grade]' => '      ',
//        ];
//        $client->submitForm('Добавить', $review);
//        $this->assertResponseStatusCodeSame(500);
//        $client->request('GET', '/review/new');
//        $review = [
//            'review[text]' => '      ',
//            'review[grade]' => '      ',
//        ];
//        $client->submitForm('Добавить', $review);
//        $this->assertResponseRedirects();
//        $client->followRedirect();
//        $this->assertPageTitleContains('Comment.ru');
//    }
}

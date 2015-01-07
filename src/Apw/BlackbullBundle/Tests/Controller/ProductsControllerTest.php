<?php

namespace Apw\BlackbullBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductsControllerTest extends WebTestCase
{
    public function testShowproducts()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showProducts');
    }

    public function testInfoproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/infoProduct');
    }

    public function testUpdateproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateProduct');
    }

    public function testDeleteproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteProduct');
    }

}

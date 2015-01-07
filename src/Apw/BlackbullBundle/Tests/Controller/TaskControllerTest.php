<?php

namespace Apw\BlackbullBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showTask');
    }

    public function testCreatetask()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createTask');
    }

}

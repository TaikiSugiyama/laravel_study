<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelloTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/hello')
            ->see('Hello world!');
    }
    public function testHello()
    {
        $response = $this->call('GET','/hello');
        $this->assertEquals(200, $response->status());
        $this->assertEquals('Hello world!',$response->getContent());
        $this->assertContains('Hello',$response->getContent());
    }
}

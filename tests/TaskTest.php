<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    public function test_setUp()
    {
        DB::table('tasks')->insert([
            ['name'=>'444'],
            ['name'=>'333'],
            ['name'=>'111'],
            ['name'=>'222'],

        ]);
        $response = $this->call('GET','/');
        $content = $response->getContent();

        $this->assertContains('111',$content);
        $this->assertContains('222',$content);
        $this->assertContains('333',$content);
        $this->assertContains('444',$content);


    }
}

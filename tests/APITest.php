<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Task;
class APITest extends TestCase
{
    use DatabaseMigrations;
    public function test_Json()
    {
        DB::table('tasks')->insert([
            ['name'=>'111', 'created_at'=>'2016-01-01 00:00:00'],
            ['name'=>'222', 'created_at'=>'2016-01-02 00:00:00'],
            ['name'=>'333', 'created_at'=>'2016-01-03 00:00:00'],
            ['name'=>'444', 'created_at'=>'2016-01-04 00:00:00'],
        ]);
        $response = $this->call('GET','/api/tasks');
        $content = $response->getContent();
        $jsonArray = json_decode($content,true);//trueで連想配列falseでオブジェクト
        $data = (['result'=>true,'data'=>[
            ['id'=>4,'name'=>'444', 'created_at'=>'2016-01-04 00:00:00','updated_at' => null],
            ['id'=>3,'name'=>'333', 'created_at'=>'2016-01-03 00:00:00','updated_at' => null],
            ['id'=>2,'name'=>'222', 'created_at'=>'2016-01-02 00:00:00','updated_at' => null],
            ['id'=>1,'name'=>'111', 'created_at'=>'2016-01-01 00:00:00','updated_at' => null],
        ]]);
        $this->assertEquals($data,$jsonArray);
    }
    public function testLimit()
    {
        DB::table('tasks')->insert([
            ['name'=>'111', 'created_at'=>'2016-01-01 00:00:00'],
            ['name'=>'222', 'created_at'=>'2016-01-02 00:00:00'],
            ['name'=>'333', 'created_at'=>'2016-01-03 00:00:00'],
            ['name'=>'444', 'created_at'=>'2016-01-04 00:00:00'],
        ]);
        $response = $this->call('GET','/api/tasks?limit=');
        
    }
}

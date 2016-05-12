<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Task;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    /**
     *
     */
    public function test_setUp()
    {
        DB::table('tasks')->insert([
//            ['name'=>'111', 'created_at'=>'2016-01-01 00:00:00'],
//            ['name'=>'222', 'created_at'=>'2016-01-02 00:00:00'],
//            ['name'=>'333', 'created_at'=>'2016-01-03 00:00:00'],
//            ['name'=>'444', 'created_at'=>'2016-01-04 00:00:00'],
            ['name'=>'111'],
            ['name'=>'222'],
            ['name'=>'333'],
            ['name'=>'444'],
        ]);

//        $this->visit('/')
//            ->seeInElement('.task-table tbody tr:nth-child(1)', '111');
//        seeInElement,nth-child,selectorがつなげて書けることがわからなかった

        $this->visit('/')
            ->seeInElement('.task-table tbody tr:nth-child(1)', '111');
        $this->visit('/')
            ->seeInElement('.task-table tbody tr:nth-child(2)', '222');
        $this->visit('/')
            ->seeInElement('.task-table tbody tr:nth-child(3)', '333');
        $this->visit('/')
            ->seeInElement('.task-table tbody tr:nth-child(4)', '444');

//        $response = $this->call('GET','/');
//        $content = $response->getContent();
//        $this->assertContains('111',$content);

    }
    public function test_add_task()
    {
        $response = $this->call('POST','task', ['name'=>'777']);
        $tasks = Task::orderBy('created_at', 'asc')->get();
        $this->assertEquals($tasks[0]->name,'777');
    }
}


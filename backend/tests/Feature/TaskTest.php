<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->authUser();

        $user =   $this->authUser();
        $this->list =  $this->createTodoList(['user_id' => $user->id]);
        $this->task = $this->createTask(['todo_list_id' => $this->list->id]);
    }

    public function test_store_a_tasks_for_a_todo_list()
    {
        $this->postJson(route('todo-list.task.store', $this->list->id), [
            'title' => $this->task->title,
            'due_date' => now()->format('Y-m-d'),
        ])
            ->assertCreated();

        $this->assertDatabaseHas('tasks', [
            'title' => $this->task->title,
            'todo_list_id' => $this->list->id,
        ]);
    }

    public function test_fetch_all_tasks_of_a_todo_list()
    {
        $response = $this->getJson(route('todo-list.task.index', $this->list->id))
            ->assertOk()
            ->json('data');

        $this->assertEquals(1, count($response));
        $this->assertEquals($this->task->title, $response[0]['title']);
    }

    public function test_update_a_tasks_for_a_todo_list()
    {
        $this->patchJson(route('task.update', $this->task->id), [
            'title' => 'updated title',
            'due_date' => now()->format('Y-m-d'),
        ])
            ->assertOk();

        $this->assertDatabaseHas('tasks', ['title' => 'updated title']);
    }

    public function test_delete_a_tasks_for_a_todo_list()
    {
        $this->deleteJson(route('task.destroy',  $this->task->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('tasks', ['title' => $this->task->title]);
    }

    public function test_completed_a_tasks_for_a_todo_list()
    {
        $this->patchJson(route('task.completed', $this->task->id))
            ->assertOk();

        $this->assertDatabaseHas('tasks', ['status' => 'completed']);
    }
}

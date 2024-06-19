<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_can_show_all_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewHas('tasks');
    }

    /** @test */
    public function test_can_create_task()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'status' => 'pending',
        ];

        $response = $this->post(route('tasks.store'), $taskData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $taskData);
    }

    /** @test */
    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $updatedData = [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
            'status' => 'completed',
        ];

        $response = $this->put(route('tasks.update', $task->id), $updatedData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $updatedData);
    }

    /** @test */
    public function test_can_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}

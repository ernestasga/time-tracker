<?php

namespace Tests\Feature;

use App\Models\User;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_only_logged_in_users_can_see_tasks_page(){
        $response = $this->get('/home');
        $response->assertRedirect(('/login'));
    }
    /** @test */
    public function test_authenticated_users_can_see_tasks_page(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/home');
        $response->assertOk();
    }
    /** @test */
    public function test_only_logged_in_user_can_create_tasks(){
        $data = [
            'title' => 'Test Title',
            'comment' => 'Test Comment',
            'date' => date('Y-m-d H:i:s'),
            'mins_spent' => 20
        ];
        $response = $this->post('/task', $data);
        $response->assertStatus(302);

    }
}

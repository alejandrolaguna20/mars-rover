<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class MarsRoverControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        config(['inertia.testing.ensure_pages_exist' => false]);
    }

    public function test_home_page_displays_mission_logs()
    {
        $logs = [];
        for ($i = 0; $i < 3; $i++) {
            $logs[] = \App\Models\MissionLog::create([
                'user_id' => $this->user->id,
                'message' => "Test message $i",
                'details' => "Test details $i",
                'type' => 'INFO'
            ]);
        }

        $response = $this->actingAs($this->user)
            ->get('/');

        $response->assertStatus(200)
            ->assertInertia(
                fn($assert) => $assert
                    ->component('Home')
                    ->has('name')
                    ->has('missionLogs', 3)
            );
    }

    public function test_update_logs_creates_new_log_entry()
    {
        $logData = [
            'message' => 'Test mission action',
            'details' => 'Detailed information about the action'
        ];

        $response = $this->actingAs($this->user)
            ->post('/update-logs', $logData);

        $response->assertSuccessful();

        $this->assertDatabaseHas('mission_logs', [
            'user_id' => $this->user->id,
            'message' => 'Test mission action',
            'details' => 'Detailed information about the action',
            'type' => 'INFO'
        ]);
    }

    public function test_unauthenticated_user_cannot_update_logs()
    {
        $logData = [
            'message' => 'Test mission action',
            'details' => 'Detailed information about the action'
        ];

        $response = $this->post('/update-logs', $logData);

        $response->assertRedirect('/login');
    }
}

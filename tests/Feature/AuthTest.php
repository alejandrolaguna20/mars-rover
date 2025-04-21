<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_renders()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertInertia(fn($assert) => $assert->component('Login'));
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'name' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'name' => 'testuser',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = User::factory()->create([
            'name' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'name' => 'testuser',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_new_user_is_created_when_name_doesnt_exist()
    {
        $this->assertDatabaseMissing('users', ['name' => 'newuser']);

        $response = $this->post('/login', [
            'name' => 'newuser',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['name' => 'newuser']);
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_login_validates_input()
    {
        $response = $this->post('/login', [
            'name' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'password']);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_users()
    {
        User::factory()->count(3)->create();

        $response = $this->get('/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password'
        ];

        $response = $this->post('/api/users', $userData);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'name' => 'Test User',
                     'email' => 'testuser@example.com',
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com'
        ]);

        $this->assertTrue(Hash::check('password', User::where('email', 'testuser@example.com')->first()->password));
    }

    /** @test */
    public function it_can_show_a_user()
    {
        $user = User::factory()->create();

        $response = $this->get("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $user->id,
                     'name' => $user->name,
                     'email' => $user->email,
                 ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $updateData = [
            'name' => 'Updated User',
            'email' => 'updateduser@example.com',
            'password' => 'newpassword'
        ];

        $response = $this->put("/api/users/{$user->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'name' => 'Updated User',
                     'email' => 'updateduser@example.com',
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => 'updateduser@example.com'
        ]);

        $this->assertTrue(Hash::check('newpassword', User::where('email', 'updateduser@example.com')->first()->password));
    }

    /** @test */
    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;
        $this->withHeaders([
            'Authorization' => "Bearer $token",
        ]);

        $response = $this->delete("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Usuario eliminado',
                 ]);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
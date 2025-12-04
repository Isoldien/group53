<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test authenticated user can retrieve profile.
     */
    public function test_authenticated_user_can_get_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->getJson('/api/profile', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'user_id' => $user->user_id,
                    'name' => 'John Doe',
                    'email' => 'john@example.com',
                    'phone' => '1234567890',
                    'role' => 'customer',
                ],
            ]);
    }

    /**
     * Test user can update profile with valid data.
     */
    public function test_user_can_update_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
            'phone' => '1111111111',
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->putJson('/api/profile', [
            'name' => 'New Name',
            'email' => 'new@example.com',
            'phone' => '2222222222',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Profile updated successfully',
                'data' => [
                    'name' => 'New Name',
                    'email' => 'new@example.com',
                    'phone' => '2222222222',
                ],
            ]);

        $this->assertDatabaseHas('users', [
            'user_id' => $user->user_id,
            'name' => 'New Name',
            'email' => 'new@example.com',
            'phone' => '2222222222',
        ]);
    }

    /**
     * Test user can update only specific fields.
     */
    public function test_user_can_update_partial_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        // Update only name
        $response = $this->putJson('/api/profile', [
            'name' => 'Updated Name',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'user_id' => $user->user_id,
            'name' => 'Updated Name',
            'email' => 'john@example.com', // Unchanged
            'phone' => '1234567890', // Unchanged
        ]);
    }

    /**
     * Test profile update fails with duplicate email.
     */
    public function test_profile_update_fails_with_duplicate_email(): void
    {
        $existingUser = User::factory()->create(['email' => 'existing@example.com']);
        $user = User::factory()->create(['email' => 'user@example.com']);

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->putJson('/api/profile', [
            'email' => 'existing@example.com',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    /**
     * Test user can update email to own email (no error).
     */
    public function test_user_can_keep_same_email_when_updating(): void
    {
        $user = User::factory()->create(['email' => 'user@example.com']);
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->putJson('/api/profile', [
            'email' => 'user@example.com', // Same email
            'name' => 'Updated Name',
        ], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test unauthenticated user cannot access profile.
     */
    public function test_unauthenticated_user_cannot_access_profile(): void
    {
        $response = $this->getJson('/api/profile');
        $response->assertStatus(401);
    }

    /**
     * Test unauthenticated user cannot update profile.
     */
    public function test_unauthenticated_user_cannot_update_profile(): void
    {
        $response = $this->putJson('/api/profile', [
            'name' => 'New Name',
        ]);

        $response->assertStatus(401);
    }
}

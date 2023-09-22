<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class RouteTest extends TestCase
{
    use RefreshDatabase; // Use this trait to reset the database after each test
    use WithFaker;
    /**
     * A basic unit test example.
     */
    public function test_localhost(): void
    {
        $response = $this->get("/");
        $response->assertStatus(200);
    }
    public function test_loginSignup(): void
    {
        $response = $this->get("/Signup");
        $response->assertStatus(200);
    }
    public function test_post(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/post");
        $response->assertStatus(200);
    }
    public function test_profile(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/profile");
        $response->assertStatus(200);
    }
    public function test_additional(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/additional-resource");
        $response->assertStatus(200);
    }
    public function test_ad(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/additional-resource");
        $response->assertStatus(200);
    }
    public function test_addit(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/additional-resource");
        $response->assertStatus(200);
    }
    public function test_addition(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/additional-resource");
        $response->assertStatus(200);
    }
    public function test_additiona(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/additional-resource");
        $response->assertStatus(200);
    }
    public function test_all(): void
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get("/additional-resource");
        $response->assertStatus(200);
    }
}

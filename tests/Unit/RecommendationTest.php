<?php

namespace Tests\Unit;

use App\Models\Profile\UserProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecommendationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic unit test example.
     */
    public function test_getRecommendations(): void
    {
        $user = User::factory()->has(UserProfile::factory())->create();

        // Simulate authentication
        $this->actingAs($user);

        // Create a mock GET request
        $response = $this->get('/recommend'); // Replace '/your-route' with the actual route

        // Assert that the response status code is 200 (OK)
        $response->assertStatus(200);
    }

    public function test_it_returns_recommendations()
    {
        // Create a user and a user profile (replace this with your actual data)
        $user = User::factory()->has(UserProfile::factory())->create();


        // Mock the Python script execution
        $mock_recommendations = NULL;
        $this->actingAs($user);
        // Send a request to the getRecommendations endpoint
        $response = $this->get('/recommend', [
            'skills_input' => 'PHP, Laravel',
        ]);

        // Assert that the response contains the recommendations
        $response->assertViewIs('dashboard.recommend');
        $response->assertViewHas('recommendations', $mock_recommendations);
    }
}

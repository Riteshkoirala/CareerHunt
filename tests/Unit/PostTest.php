<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_post(): void
    {
        $user = User::factory()->create();

        // Create a post data with a missing title
        $postData = [
            'user_id' => $user->id,
            'message' => 'This is the post description',
        ];

        // Attempt to store the post
        $response = $this->actingAs($user)->post(route('post.store'), $postData);

        // Assert that the response contains a validation error for the 'title' field
        $response->assertSessionHasErrors('title');

        // Assert that the post was not stored in the database
        $this->assertDatabaseMissing('posts', $postData);
    }
    public function test_StorePostSuccessfully()
    {
        // Create a user for the test
        $user = User::factory()->create();

        // Create a post data with all required fields
        $postData = [
            'user_id' => $user->id,
            'title' => 'Test Post',
            'message' => 'This is the post description',
        ];

        // Attempt to store the post
        $response = $this->actingAs($user)->post(route('post.store'), $postData);

        // Assert that the response is a redirect to the index route
        $response->assertRedirect(route('post.index'));

        // Assert that the post was stored in the database
        $this->assertDatabaseHas('posts', $postData);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Post\comments\CommentReaction;
use App\Models\Post\comments\PostReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    // Function for handling like reactions on posts
    public function postLikeReaction(Request $request) {
        // Check if the user has already reacted to this post
        $present = PostReaction::where('user_id', Auth::user()->id)
            ->where('post_id', $request->itemId)
            ->first();

        if ($present) {
            // If the user has already reacted, update the reaction to 'like' (1)
            $present->update([
                'reaction' => 1,
            ]);
        } else {
            // If the user hasn't reacted before, create a new reaction with 'like' (1)
            $entry = PostReaction::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->itemId,
                'reaction' => 1,
            ]);
        }

        // Get the count of 'like' reactions and 'dislike' reactions for this post
        $postLike = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 1)
            ->get();

        $postDis = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 0)
            ->get();

        // Return a JSON response with success status, like count, and dislike count
        return response()->json([
            'success' => true,
            'like' => count($postLike),
            'DisLike' => count($postDis), // Make sure this matches the case in your JavaScript
        ]);
    }

    // Function for handling dislike reactions on posts
    public function postDisReaction(Request $request) {
        // Check if the user has already reacted to this post
        $present = PostReaction::where('user_id', Auth::user()->id)
            ->where('post_id', $request->itemId)
            ->first();

        if ($present) {
            // If the user has already reacted, update the reaction to 'dislike' (0)
            $present->update([
                'reaction' => 0,
            ]);
        } else {
            // If the user hasn't reacted before, create a new reaction with 'dislike' (0)
            $entry = PostReaction::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->itemId,
                'reaction' => 0,
            ]);
        }

        // Get the count of 'like' reactions and 'dislike' reactions for this post
        $postLike = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 1)
            ->get();

        $postDis = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 0)
            ->get();

        // Return a JSON response with success status, like count, and dislike count
        return response()->json([
            'success' => true,
            'like' => count($postLike),
            'DisLike' => count($postDis), // Make sure this matches the case in your JavaScript
        ]);
    }

    // Function for handling like reactions on comments
    public function commentLikeReaction(Request $request) {
        // Check if the user has already reacted to this comment
        $present = CommentReaction::where('user_id', Auth::user()->id)
            ->where('comment_id', $request->itemId)
            ->first();

        if ($present) {
            // If the user has already reacted, update the reaction to 'like' (1)
            $present->update([
                'reaction' => 1,
            ]);
        } else {
            // If the user hasn't reacted before, create a new reaction with 'like' (1)
            $entry = CommentReaction::create([
                'user_id' => Auth::user()->id,
                'comment_id' => $request->itemId,
                'reaction' => 1,
            ]);
        }

        // Get the count of 'like' reactions and 'dislike' reactions for this comment
        $ComLike = CommentReaction::where('comment_id', $request->itemId)
            ->where('reaction', 1)
            ->get();

        $ComDis = CommentReaction::where('comment_id', $request->itemId)
            ->where('reaction', 0)
            ->get();

        // Return a JSON response with success status, like count, and dislike count
        return response()->json([
            'success' => true,
            'like' => count($ComLike),
            'DisLike' => count($ComDis), // Make sure this matches the case in your JavaScript
        ]);
    }

    // Function for handling dislike reactions on comments
    public function commentDisReaction(Request $request) {
        // Check if the user has already reacted to this comment
        $present = CommentReaction::where('user_id', Auth::user()->id)
            ->where('comment_id', $request->itemId)
            ->first();

        if ($present) {
            // If the user has already reacted, update the reaction to 'dislike' (0)
            $present->update([
                'reaction' => 0,
            ]);
        } else {
            // If the user hasn't reacted before, create a new reaction with 'dislike' (0)
            $entry = CommentReaction::create([
                'user_id' => Auth::user()->id,
                'comment_id' => $request->itemId,
                'reaction' => 0,
            ]);
        }

        // Get the count of 'like' reactions and 'dislike' reactions for this comment
        $ComLike = CommentReaction::where('comment_id', $request->itemId)
            ->where('reaction', 1)
            ->get();

        $ComDis = CommentReaction::where('comment_id', $request->itemId)
            ->where('reaction', 0)
            ->get();

        // Return a JSON response with success status, like count, and dislike count
        return response()->json([
            'success' => true,
            'like' => count($ComLike),
            'DisLike' => count($ComDis), // Make sure this matches the case in your JavaScript
        ]);
    }
}

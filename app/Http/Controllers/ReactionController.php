<?php

namespace App\Http\Controllers;

use App\Models\Post\comments\PostReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function postLikeReaction(Request $request) {
        $present = PostReaction::where('user_id', Auth::user()->id)
            ->where('post_id', $request->itemId)
            ->first();

        if ($present) {
            $present->update([
                'reaction' => 1,
            ]);
        } else {
            $entry = PostReaction::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->itemId,
                'reaction' => 1,
            ]);
        }

        $postLike = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 1)
            ->get();

        $postDis = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 0)
            ->get();

        return response()->json([
            'success' => true,
            'like' => count($postLike),
            'DisLike' => count($postDis), // Make sure this matches the case in your JavaScript
        ]);
    }

    public function postDisReaction(Request $request) {
        $present = PostReaction::where('user_id', Auth::user()->id)
            ->where('post_id', $request->itemId)
            ->first();

        if ($present) {
            $present->update([
                'reaction' => 0,
            ]);
        } else {
            $entry = PostReaction::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->itemId,
                'reaction' => 0,
            ]);
        }

        $postLike = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 1)
            ->get();

        $postDis = PostReaction::where('post_id', $request->itemId)
            ->where('reaction', 0)
            ->get();

        return response()->json([
            'success' => true,
            'like' => count($postLike),
            'DisLike' => count($postDis), // Make sure this matches the case in your JavaScript
        ]);
    }

}

<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\Post\PostStoreRequest;
use App\Http\Requests\Api\Client\Post\PostUpdateRequest;
use App\Http\Resources\Client\Post\PostResource;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class PostController extends Controller
{

    /**
     * @param PostStoreRequest $request
     * @param Topic $topic
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function store(PostStoreRequest $request, Topic $topic): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken)->first();
        $user = $token->tokenable;
        $data['userId'] = $user->id;
        $data['topicId'] = $topic->id;
        $post = Post::firstOrCreate($data);
        return response()->json([
            'message' => 'The post created.',
            'post' => new PostResource($post),
        ]);
    }

    /**
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    protected function update(PostUpdateRequest $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        foreach ($data as $key => $value) {
            $post->$key = $value;
        }
        $post->save();
        return response()->json([
            'message' => 'The post updated.',
            'post' => new PostResource($post),
        ]);
    }

    /**
     * @param Post $post
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function bookmarks(Request $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken)->first();
        $user = $token->tokenable;
        $user->bookmarks()->toggle($post->id);
        return response()->json(['message' => 'Success.']);
    }

    /**
     * @param Post $post
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function like(Request $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken)->first();
        $user = $token->tokenable;
        $user->likes()->toggle($post->id);
        return response()->json(['message' => 'Success.']);
    }

}

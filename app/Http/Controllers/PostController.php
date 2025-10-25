<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // there use local scope which is not directly run
        $posts = Post::withUserRole()
            ->with('comments')
            ->get();

        $formatted = $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => ucwords($post->title),
                'author' => $post->users->name ?? "Unknown",
                'comments' => $post->comments->map(function ($comment) {
                    return strtoupper($comment->body);
                }),
            ];
        });

        return $formatted;



        // $posts = Post::find(2)->oldest_comment;
        // return $posts;
        // $posts = Post::with('comments')->with('tags')->get();
        // return $posts;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::create([
            'title' => 'Fourth Post',
            'description' => 'This is the content of the Fourth post.',
            'user_id' => 1
        ]);

        $post->images()->create([
            'url' => 'images/post4.jpg'
        ]);

        $post->comments()->create([
            'comment' => 'This is a  comment on my Fourth the post.'
        ]);



        // $post = Post::find(1);

        // Taggable::create([
        //     'taggable_id' => 3,
        //     'taggable_type' => Post::class,
        //     'tag_id' => 2,
        // ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        }

        return redirect()->route('posts.index')->with('error', 'Post not found.');

    }

}

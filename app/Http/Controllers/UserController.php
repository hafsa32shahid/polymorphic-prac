<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::with(['latestpost' => function ($query) {
        $query->select('posts.id', 'posts.title', 'posts.description', 'posts.user_id');
    }])
    ->get(['id', 'name', 'email']);

return $users;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $user = User::create([
        'name'=>'nimra khan',
        'email'=>'NimRa@gmail.com',
        'role'=>'user'
       ]);

       $user->images()->create(['url'=>'images/image2.jpg']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}

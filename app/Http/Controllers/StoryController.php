<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\StoryFragment;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = story::latest()->get();

        return view ('stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required'
    ]);

    $story = Story::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => auth()->id()
    ]);

    return redirect('/stories/' . $story->id)
        ->with('success', 'Historia creada correctamente');
}

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        $story->load('user', 'fragments.user');
        return view('stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        if ($story->user_id != auth()->id()) {
            abort(403);
        }

        return view('stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
         if ($story->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $story->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('/my-stories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        if ($story->user_id != auth()->id()) {
            abort(403);
        }

        $story->delete();

        return back();
    }

     public function myStories()
    {
        $stories = Story::where('user_id', auth()->id())
                        ->latest()
                        ->get();

        return view('stories.my-stories', compact('stories'));
    }




    public function addFragment(Request $request, Story $story)
    {
        $request->validate([
            'content' => 'required'
        ]);

        StoryFragment::create([
            'content' => $request->content,
            'story_id' => $story->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }
}

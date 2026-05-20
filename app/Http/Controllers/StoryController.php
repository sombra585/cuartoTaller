<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\StoryFragment;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Listar historias (con búsqueda)
     */
    public function index(Request $request)
    {
        $query = Story::with('user')->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%')
                  ->orWhere('genre', 'like', '%' . $request->search . '%');
        }

        $stories = $query->get();

        return view('stories.index', compact('stories'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Guardar nueva historia
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:100',
            'content' => 'required',
            'cover' => 'nullable|file|max:4096'
        ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')
                ->store('covers', 'public');
        }

        $story = Story::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'cover' => $coverPath,
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);

        return redirect('/stories/' . $story->id);
    }

    /**
     * Ver historia específica
     */
    public function show(Story $story)
    {
        $story->load('user', 'fragments.user');

        return view('stories.show', compact('story'));
    }

    /**
     * Formulario de edición
     */
    public function edit(Story $story)
    {
        if ($story->user_id != auth()->id()) {
            abort(403);
        }

        return view('stories.edit', compact('story'));
    }

    /**
     * Actualizar historia
     */
    public function update(Request $request, Story $story)
    {
        if ($story->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:100',
            'content' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        $coverPath = $story->cover;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')
                ->store('covers', 'public');
        }

        $story->update([
            'title' => $request->title,
            'genre' => $request->genre,
            'cover' => $coverPath,
            'content' => $request->content
        ]);

        return redirect('/my-stories');
    }

    /**
     * Eliminar historia
     */
    public function destroy(Story $story)
    {
        if ($story->user_id != auth()->id()) {
            abort(403);
        }

        $story->delete();

        return back();
    }

    /**
     * Mis historias (con búsqueda)
     */
    public function myStories(Request $request)
    {
        $stories = Story::with('user')
            ->where('user_id', auth()->id())
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->get();

        return view('stories.my-stories', compact('stories'));
    }

    /**
     * Agregar fragmento a una historia
     */
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
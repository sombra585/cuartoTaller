<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $sort = $request->sort ?? 'created_at';

    $direction = $request->direction ?? 'desc';

    $users = User::when($search, function ($query) use ($search) {

            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");

        })
        ->orderBy($sort, $direction)
        ->paginate(10)
        ->withQueryString();

    return view('users.index', compact(
        'users',
        'sort',
        'direction'
    ));
}


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/users');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
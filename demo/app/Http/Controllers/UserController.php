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
        $data = User::latest()->paginate(10);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'password'      =>  'required',
            
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
            'password'      =>  'required',
        ]);

        $user = User::find($request->hidden_id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = $request->password;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User Data deleted successfully');
    }
}

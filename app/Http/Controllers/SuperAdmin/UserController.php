<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role', 'admin')->get();
        return view('super-admin.admin.table', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super-admin.admin.add-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin-table')->with('success', 'Admin successfully added');
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
        $admin = User::findOrFail($id);

        $admin->delete();

        return redirect()->route('admin-table')->with('success', 'User successfully deleted');
    }
}

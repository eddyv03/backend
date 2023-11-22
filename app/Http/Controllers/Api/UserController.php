<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     */

     public function store(UserRequest $request)
     {
         //Retrieve the validated input data...
         $validated = $request->validated();

         $validated['password'] = Hash::make($validated['password']);
 
         $user = User::create($validated);
 
         return $user;
     }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user -> name = $validated['name'];

        $user-> save();

        return $user;
    }

    public function email(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user -> email = $validated['email'];

        $user-> save();

        return $user;

    }

    public function password(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user -> password = Hash::make($validated['password']);

        $user-> save();

        return $user;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return $user;
    }

    public function image(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        if ( !is_null($user->image)){
            Storage::disk('public')->delete($user->image);
        }

        $user->image = $request->file('image')->storePublicly('images', 'public');

        $user-> save();

        return $user;

    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        
        return response()->json([
            'ok' => true,
            'message' => 'Users account recovered',
            'data' => $users
        ]);
    }


    public function store(StoreUserRequest $request)
    {
        if ($request->avatar) {
            $image = $request->file('avatar');
            $imageName = $request->username . '.' . uuid_create(UUID_TYPE_TIME) . '.' . $image->extension();
            
            $image->move(public_path('avatars'), $imageName);

            $request->avatar = $imageName;
        }


        $user = User::create([
            ...$request->safe()->all(),
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar
        ]);


        return response()->json([
            'ok' => true,
            'message'=> 'User account created successfully',
            'data' => $user
        ], 201);
    }


    public function show(User $user)
    {
        return response()->json([
            'ok' => true,
            'message' => 'User account recovered',
            'data' => $user->load('posts.comments')
        ]);
    }


    public function update(UpdateUserRequest $request, User $user)
    {        
        $user->fill($request->safe()->all());


        $resetAvatarCache = function() use ($user) {
            $avatars = glob(public_path('avatars/' . $user->username . '.*'));
        
            foreach ($avatars as $avatar) {
                unlink($avatar);
            }
        };
        

        if ($request->avatar) {
            $image = $request->file('avatar');

            if ($image) {
                $imageName = ($request->username ?? $user->username) . '.' . uuid_create(UUID_TYPE_TIME) . '.png';
                $resetAvatarCache();
                $image->move(public_path('avatars'), $imageName);
            }

            $user->avatar = $imageName;
        }


        $user->save();

        
        return response()->json([
            'ok' => true,
            'message' => 'User account modified successfully',
            'data' => $user
        ]);
    }


    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'ok' => true,
            'message' => 'User account deleted successfully',
            'data' => $user
        ]);
    }
}
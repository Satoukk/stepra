<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    //user一覧取得
    public function index(): JsonResponse
    {
        $users = User::query()->orderBy('id')->get();

        return response()->json($users);
    }


    //user詳細取得
    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }


    //user作成
    public function store(CreateUserRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        return response()->json($user, 201);
    }


    //user情報更新
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->fill($request->validated());
        $user->save();

        return response()->json($user);
    }


    //user削除
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(null, 204);
    }
}

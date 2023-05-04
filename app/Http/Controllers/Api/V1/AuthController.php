<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Requests\AuthUserRequest;

class AuthController extends Controller
{
    use HttpResponses;

    public function auth(AuthUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only(['email','password']))){
            return $this->error("","Dane nie pasują", 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token'=> $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ]);
    }
}

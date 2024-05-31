<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterApiRequest;
use App\Http\Resources\RegisterResource;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterApiController extends Controller
{
    use ApiTrait;

    public function register(RegisterApiRequest $request)
    {
        $credentials = $request->validated();
        $user = User::create($credentials);
        if (Auth::attempt($credentials['email'], $credentials['password'])) {
            $user = Auth::user();
            return $this->returnData('data', new RegisterResource($user), 'user created and logged in');
        }
        return $this->errorMessage('wrong data', 401);
    }
}

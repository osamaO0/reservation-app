<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\loginApiRequest;
use App\Http\Resources\LoginResource;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    use ApiTrait;
    
    public function login(loginApiRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->returnData('data', new LoginResource($user), 'user logged in');
        }
        return $this->errorMessage('wrong data', 401);
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * APiLoginController
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function __invoke(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if (! $user || ! Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken('user_token')->plainTextToken;
    }
}

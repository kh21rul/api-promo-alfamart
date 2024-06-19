<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    private AuthenticationService $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Use service to attempt login
        $result = $this->authenticationService->login($request->email, $request->password);

        if (!$result) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'message' => 'Login success',
            'access_token' => $result['token'],
            'user' => $result['user']
        ]);
    }

    public function logout(Request $request)
    {
        $user = $this->authenticationService->logout($request->user());

        return response()->json([
            'message' => 'Logout success',
            'user' => $user
        ]);
    }

    public function getUser(Request $request)
    {
        $user = $this->authenticationService->getUser($request->user());
        return response()->json($user);
    }
}

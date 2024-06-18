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
        $token = $this->authenticationService->login($request->email, $request->password);

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->authenticationService->logout($request->user());
        return response()->json(['message' => 'Logout success']);
    }

    public function getUser(Request $request)
    {
        $user = $this->authenticationService->getUser($request->user());
        return response()->json($user);
    }
}

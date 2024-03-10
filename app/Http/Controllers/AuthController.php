<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken('MyApp')->accessToken;

            $success['token'] = $token;
            $success['name'] =  $user->name;

            $request->session()->put('token', $token);

            return redirect()->to('/')->with($success);
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();


            return redirect()->to('/login');
//            return response()->json([
//                'success' => true,
//                'message' => 'Logout successfully'
//            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout'
            ]);
        }
    }

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }



//    public AuthService $authService;
//
//    public function __construct(AuthService $authService)
//    {
//        $this->authService = $authService;
//    }
//
//    public function register(RegisterRequest $request)
//    {
//        $registerData = $request->validated();
//
//        $response = $this->authService->register($registerData);
//
//        return redirect()->to('/')->with($response);
//    }
//
//    public function login(LoginRequest $request)
//    {
//        $loginData = $request->validated();
//
//        $response = $this->authService->login($loginData);
//
//        return redirect()->to('/')->with($response);
//    }
//
//    public function logout(Request $request)
//    {
//        $request->user()->token()->revoke();
//
//        return response([
//            'message' => 'Logged out successfully'
//        ]);
//    }
}

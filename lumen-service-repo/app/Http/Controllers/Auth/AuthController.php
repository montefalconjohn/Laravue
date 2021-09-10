<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Users\UserServiceInterface;

class AuthController extends Controller
{
     /** @var UserServiceInterface */
     private $userService;

     public function __construct(UserServiceInterface $user)
     {
         $this->userService = $user;
     }
 
     /**
      * Log in method
      * 
      * @param Request $request
      */
     public function login(AuthenticationsRequest $request)
     {
         $response = $this->userService->login($request);
         var_dump($response);
         // return new AuthenticationsResource($response);
     }
 
     /**
      * Log out method
      * 
      * @param Request $request
      */
     public function logout(AuthenticationsRequest $request)
     {
        $this->userService->logout($request);
 
         return response()->json([
             'message' => 'Successfully logged out.'
         ]);
     }
}

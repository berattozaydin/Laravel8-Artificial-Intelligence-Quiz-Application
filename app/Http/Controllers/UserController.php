<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\AuthManager;
//use Illuminate\Support\Facades\Auth;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

//use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\NewAccessToken;
use Laravel\Sanctum\Sanctum;

class UserController extends Controller
{
   public function index(Request $request){
       return $request->user();
   }

   public function register(Request $request){
       $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:users',
           'password'=>'required|confirmed',
           ]);
       $result=User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
           ]);
       return $result;
   }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['The provided credentials are incorrect.']
            ], 500);
        }

        $userToken = $user->createToken('api_token')->plainTextToken;

        return response(['token' => $userToken], 200);
    }

    public function logout(Request $request){
       $request->user()->forceFill(['api_token'=>null])->save();
       return response()->json(['message'=>'success']);
   }
}

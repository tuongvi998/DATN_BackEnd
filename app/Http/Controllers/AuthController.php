<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RegisterResourse;
use App\Http\Resources\VolunteerProfile;
use App\Volunteer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->guard = "api";
    }

    public function register(RegisterRequest $request){
        $token = null;
        $credentials = request(['email', 'password' ]);
        $token = auth($this->guard)->attempt($credentials);
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => bcrypt($request->password)
            ]
        );
        if ($request->role_id == 1){
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->save();
            return response()->json([
                new RegisterResourse($user)
            ]);
        }
        elseif ($request->role_id == 2){
            $group = new Group();
            $group->user_id = $user->id;
            $group->field_id = $request->field_id;
            $group->save();
            return response()->json([
                new RegisterResourse($user)
            ]);
        }
        elseif($request->role_id == 3){
            $volunteer = new Volunteer();
            $volunteer->user_id = $user->id;
            $volunteer->save();
            return response()->json([
                new RegisterResourse($user)
            ]);
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        $token = null;
        if ($validator->fails()) {
            return response()->json('wrong email or password', 422);
        }

        $credentials = request(['email', 'password']);
        if (!$token = auth($this->guard)->attempt($credentials)) {
            return response()->json(['error' => 'email or password incorrect'], 401);
        }
        $role = 'role';
        if(auth()->user()->is_active == 0) {
            return response()->json(['error' => 'you can\'t login now']);
        }
        return $this->respondWithToken($token);
    }

    public function logout() {
        auth()->logout();
//        auth($this->guard)->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        if(auth()->user()->role_id == '3'){
            //return response()->json(new VolunteerProfile(auth()->user()));
            $volunteer = Volunteer::where('user_id', '=', auth()->user()->id)
                ->join('users', 'users.id', '=', 'volunteers.user_id')
                ->select('users.name', 'users.email', 'volunteers.address', 'volunteers.birthday', 'volunteers.gender',
                'volunteers.phone', 'volunteers.avatar')
                ->get();
            return Response::json($volunteer);
        }
        else if(auth()->user()->role_id == '2'){
            $group = Group::where('user_id', '=', auth()->user()->id)
                ->join('users', 'users.id', '=', 'groups.user_id')
                ->select('users.name', 'users.email', 'groups.address','groups.phone', 'groups.avatar')
                ->get();
            return response($group);
        }
    }

    public function check()
    {
        return auth()->refresh();
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 36000,
            'user' => auth()->user()
        ]);
    }
}

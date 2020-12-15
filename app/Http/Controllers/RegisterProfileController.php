<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterProfileRequest;
use App\RegisterProfile;
use App\User;
use Illuminate\Http\Request;

class RegisterProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create(RegisterProfileRequest $request)
    {
//        $post_fields = $request->only(['volunteer_user_id','activity_id', 'isAccept','register_date',
//            'introduction', 'interest']);
//        $register_profile = new RegisterProfile($post_fields);
        $register_profile = new RegisterProfile();
        $register_profile->volunteer_user_id = $request->volunteer_user_id;
        $register_profile->activity_id = $request->activity_id;
        $register_profile->isAccept = $request->isAccept;
        $register_profile->register_date = $request->register_date;
        $register_profile->introduction = $request->introduction;
        $register_profile->interest = $request->interest;
        $register_profile->save();
        return response()->Json([
            'message:'=>'register profile create success',
            'data' => $register_profile
        ]);
    }

    public function registerProfileJoined($activity_id) //id of activity
    {
        $register_profiles = RegisterProfile::where('register_profiles.activity_id', '=', $activity_id)
            ->join('users','users.id','=', 'register_profiles.volunteer_user_id')
            ->join('volunteers','volunteers.user_id','=','users.id')
            ->select('register_profiles.id','register_profiles.isAccept', 'register_profiles.register_date', 'register_profiles.interest', 'register_profiles.introduction',
                'users.name', 'users.email', 'volunteers.gender', 'volunteers.phone', 'volunteers.birthday')
            ->where('register_profiles.isAccept','=',true)
            ->get();
        return response()->json([
            "message" => "register profile by activity id",
            "data" => $register_profiles
        ]);
    }

    public function registerProfileRegister($activity_id) //id of activity
    {
        $register_profiles = RegisterProfile::where('register_profiles.activity_id', '=', $activity_id)
            ->join('users','users.id','=', 'register_profiles.volunteer_user_id')
            ->join('volunteers','volunteers.user_id','=','users.id')
            ->select('register_profiles.id','register_profiles.isAccept', 'register_profiles.register_date', 'register_profiles.interest', 'register_profiles.introduction',
                'users.name', 'users.email', 'volunteers.gender', 'volunteers.phone', 'volunteers.birthday')
            ->where('register_profiles.isAccept','=',false)
            ->get();
        return response()->json([
            "message" => "register profile by activity id",
            "data" => $register_profiles
        ]);
    }

    public function changeAccept($id){
//        $user_id = User::where('email','=',$email)->get('id');
        $rp = RegisterProfile::where('id','=',$id)
            ->update(['isAccept' => true]);
        return response()->json([
            "message" => "update success",
            "data" => $rp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

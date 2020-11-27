<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::join('users','user_id', '=','users.id')
            ->select('volunteers.id', 'volunteers.user_id', 'volunteers.avatar', 'volunteers.address', 'volunteers.gender',
                'volunteers.phone', 'users.name', 'users.email', 'users.is_active','volunteers.birthday')
            ->orderBy('volunteers.id')
            ->get();
        return response()->json([
            'message' => 'all volunteers',
            'data' => $volunteers,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setRoleAdmin($id)
    {
        $user = DB::table('users')
            ->find($id);
        if($user == null ){
            return response()->Json('id not found');
        }
        else{
            if(DB::table('admins')->where('user_id', '=',$id) == null){
                $vlt = DB::table('volunteers')
                    ->where('user_id', '=',$id)
                    ->delete();
                $admin = new Admin();
                $admin->user_id = $user->id;
                $admin->save();
                return response()->Json([
                    'data' => $admin
                ]);
            }else{
                return response()->Json('user_id already exists');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteer = DB::table('volunteers')
            ->where('id' ,'=',$id)
            ->get();
        return response()->Json([
            'user:'=> $volunteer
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($user_id) // send id of volunteer in user table
    {
       $vlt = User::where('id', '=', $user_id)
            ->first();
        if($vlt == null) {
            return response()->Json('id not found');
        }
        else{
            User::where('id', '=', $user_id)
                ->delete();
            return response()->Json('User delete successful');
        }
//        $vlt = Volunteer::where('volunteers.id', '=', $id)
//            ->join('users', 'users.id', '=', 'volunteers.user_id')
//
//            ->select('volunteers.id', 'users.id as user_id' )
//            ->get();
////        return response($vlt.user_id);
//        if($vlt == null) {
//            return response()->Json('id not found');
//        }else{
//            $user_id = $vlt.value(user_id);
//            $user = User::find($user_id);
//            $user->delete();
//            return response()->Json('User delete successful');
//        }
    }
}

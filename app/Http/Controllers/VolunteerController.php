<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteer = DB::table('volunteers')
            ->join('users','user_id', '=','users.id')
            ->select('volunteers.id', 'volunteers.user_id', 'users.name', 'users.email')
            ->get();
        return response()->Json([
            'all volunteer' => $volunteer
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
        //
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
    public function destroy($id) // send id of volunteer in user table
    {
        $vlt = DB::table('users')
            ->where('id', '=', $id)
            ->first();
        if($vlt == null) {
            return response()->Json('id not found');
        }
        else{
            DB::table('users')
                ->where('id', '=', $id)
                ->delete();
            return response()->Json('PersonalUser delete successful');
        }
    }
}

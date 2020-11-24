<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::join('users','user_id','=','users.id')
            ->join('fields','field_id', '=', 'fields.id')
            ->select('fields.name as field_name','groups.id', 'groups.user_id', 'groups.address', 'groups.avatar', 'groups.field_id', 'users.email', 'users.name')
            ->get();
        return response()->Json([
           'data'=> $groups
        ]);
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        $group = DB::table('groups')
            ->where('id' ,'=',$id)
            ->get();
        return response()->Json([
            'group:'=> $group
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($user_id)
    {
        $vlt = Group::where('user_id', '=', $user_id)
            ->first();
        if($vlt == null) {
            return response()->Json('id not found');
        }
        else{
            User::where('id', '=', $user_id)
                ->delete();
            return response()->Json('User delete successful');
        }
    }
}

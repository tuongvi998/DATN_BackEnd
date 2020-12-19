<?php

namespace App\Http\Controllers;

use App\ActivityDetail;
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
        return response()->json([
           'data'=> $groups,
            'message' => 'all groups'
        ]);
    }

    public function getTwoGroup(){
//        SELECT groups.id, groups.user_id, activity_details.group_id, activity_details.countnum
//        FROM groups JOIN (SELECT activity_details.group_id, COUNT(*) AS countnum FROM activity_details
//        GROUP BY activity_details.group_id) activity_details ON (groups.id = activity_details.group_id)
//        ORDER BY activity_details.countnum DESC LIMIT 2
        $groups = Group::join('activity_details','activity_details.group_id','=','groups.id')
            ->join('users','users.id','=','groups.user_id')
            ->join('fields','fields.id','=','groups.field_id')
            ->selectRaw('activity_details.group_id, count(activity_details.group_id) as group_count, users.name, users.email,
            groups.avatar, groups.phone, groups.phone, fields.name as field_name')
            ->groupBy('activity_details.group_id','users.name','users.email','groups.phone','groups.phone','groups.avatar','fields.name' )
            ->orderBy('group_count','DESC')
            ->limit(2)
            ->get();
        return response()->json([
            'data'=> $groups,
            'message' => '2 groups have most activities'
        ]);
    }
    public function getTenGroup(){
//        SELECT groups.id, groups.user_id, activity_details.group_id, activity_details.countnum
//        FROM groups JOIN (SELECT activity_details.group_id, COUNT(*) AS countnum FROM activity_details
//        GROUP BY activity_details.group_id) activity_details ON (groups.id = activity_details.group_id)
//        ORDER BY activity_details.countnum DESC LIMIT 2
        $groups = Group::join('activity_details','activity_details.group_id','=','groups.id')
            ->join('users','users.id','=','groups.user_id')
            ->join('fields','fields.id','=','groups.field_id')
            ->selectRaw('activity_details.group_id, count(activity_details.group_id) as group_count, users.name, users.email,
            groups.avatar, groups.phone, groups.phone, fields.name as field_name')
            ->groupBy('activity_details.group_id','users.name','users.email','groups.phone','groups.phone','groups.avatar','fields.name' )
            ->orderBy('group_count','DESC')
            ->limit(10)
            ->get();
        return response()->json([
            'data'=> $groups,
            'message' => '2 groups have most activities'
        ]);
    }

    public function getGroupByField($name){
        $groups = Group::join('fields','fields.id', '=','groups.field_id')
            ->where('fields.name',$name)
            ->join("users","users.id","=","groups.user_id")
            ->select('groups.id',"groups.avatar", "groups.address", "groups.phone", "users.name", "users.email")
            ->get();
        return response()->json([
            'data' => $groups,
            'message' => 'all group by field'
        ]);
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

    public function export($id)
    {
        dispatch(new \App\Jobs\Export\User(auth()->user(), $id));
    }
}

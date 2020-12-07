<?php

namespace App\Http\Controllers;

use App\ActivityDetail;
use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        $activities =ActivityDetail::all();
        return response()->Json($activities);
    }

    public function getActiveById($id)
    {
        $groups = ActivityDetail::where('group_id', '=', $id)
            ->get();
        return response()->json([
            'data'=> $groups,
            'message' => 'all groups'
        ]);
    }
    public function create(ActivityRequest $request)
    {
        $post_fields = $request->only(['group_id', 'title', 'content',
                            'max_register', 'min_register', 'image', 'donate', 'cost','start_date',
                            'end_date', 'close_date']);
        $activity = new ActivityDetail($post_fields);
//        $activity->group_id = $request->group_id;
//        $activity->title = $request->title;
//        $activity->content = $request->conten; //content: error
//        $activity->max_register = $request->max_register;
//        $activity->min_register = $request->min_register;
//        $activity->image = $request->image;
//        $activity->donate = $request->donate;
//        $activity->cost = $request->cost;
//        $activity->start_date = $request->start_date;
//        $activity->end_date = $request->end_date;
//        $activity->close_date = $request->close_date; //close register
        //$activity->save();
        return response()->Json([
            'message:'=>'activity create success',
            'data' => $activity
        ]);
    }

    public function getUpcomingActivity(Request $request)
    {
//        echo "current date: ".date('Y-m-d');
//        var_dump(date('Y-m-d'));
        $activity = ActivityDetail::where('start_date','>', date('Y-m-d'))
            ->join('groups', 'activity_details.group_id','=', 'groups.id')
            ->join('users','groups.user_id', '=', 'users.id')
            ->join('fields', 'groups.field_id', '=', 'fields.id')
            ->select('activity_details.id', 'activity_details.start_date', 'activity_details.end_date', 'activity_details.address',
            'activity_details.max_register', 'activity_details.min_register', 'activity_details.title', 'activity_details.content',
            'activity_details.image', 'activity_details.donate', 'activity_details.cost', 'activity_details.close_date', 'users.name as group_name',
            'fields.name as field_name')
            ->orderby('activity_details.start_date')
            ->limit(10)
            ->get();
        return response()->json([
            'message' => 'upcoming activity',
            'data'=> $activity]);
    }
    public function getAllUpcomingActivity(Request $request)
    {
//        echo "current date: ".date('Y-m-d');
//        var_dump(date('Y-m-d'));
        $activity = ActivityDetail::where('start_date','>', date('Y-m-d'))
            ->join('groups', 'activity_details.group_id','=', 'groups.id')
            ->join('users','groups.user_id', '=', 'users.id')
            ->join('fields', 'groups.field_id', '=', 'fields.id')
            ->select('activity_details.id', 'activity_details.start_date', 'activity_details.end_date', 'activity_details.address',
                'activity_details.max_register', 'activity_details.min_register', 'activity_details.title', 'activity_details.content',
                'activity_details.image', 'activity_details.donate', 'activity_details.cost', 'activity_details.close_date', 'users.name as group_name',
                'fields.name as field_name')
            ->orderby('activity_details.start_date')
            ->get();
        return response()->json([
            'message' => 'upcoming activity',
            'data'=> $activity]);
    }
    public function getCompletedActivity(Request $request)
    {
        echo "current date: ".date('Y-m-d');
        var_dump(date('Y-m-d'));
        $activity = ActivityDetail::where('end_date','<', date('Y-m-d'))
            ->get();
        return response()->json(['activity'=> $activity]);
    }
    public function getActivityNeedFunding(){
        $activity = ActivityDetail::where('donate', '<', 'cost')
            ->get();
        if($activity == null){
            return response("No activities need funding");
        }else{
            return response()->json([
                'activity' => $activity
            ]);
        }
    }

    public function show($id)
    {
        $activity = ActivityDetail::find($id);
        if($activity==null){
            return response("This activity is not exist");
        }
        else{
            return response()->json($activity);
        }
    }

    public function update(ActivityRequest $request, $id)
    {   $activity = ActivityDetail::find($id);
    if($activity==null){
        return response()->json('This activity is not exist');
    }
    else{
        $activity->title = $request->title;
        $activity->content = $request->conten; //content: error
        $activity->max_register = $request->max_register;
        $activity->min_register = $request->min_register;
        $activity->image = $request->image;
        $activity->donate = $request->donate;
        $activity->cost = $request->cost;
        $activity->start_date = $request->start_date;
        $activity->end_date = $request->end_date;
        $activity->clode_date = $request->close_date; //close register
        return response()->Json([
            'message:'=>'activity update success',
            'data' => $activity
        ]);
    }

    }

    public function destroy($id)
    {
        $activity = ActivityDetail::find($id);
        if($activity == null){
            return response('This activity is not exist');
        }
        else{
            $activity->delete();
            return response('Activity delete successful');
        }
    }
}

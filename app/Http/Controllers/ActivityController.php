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

    public function create(ActivityRequest $request)
    {
        $activity = new ActivityDetail();
        $activity->group_id = $request->group_id;
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
        $activity->save();
        return response()->Json([
            'message:'=>'activity create success',
            'data' => $activity
        ]);
    }

    public function getUpcomingActivity(Request $request)
    {
        echo "current date: ".date('Y-m-d');
        var_dump(date('Y-m-d'));
        $activity = ActivityDetail::where('start_date','>', date('Y-m-d'))
            ->get();
        return response()->json(['activity'=> $activity]);
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

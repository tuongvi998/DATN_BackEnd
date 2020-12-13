<?php

namespace App\Http\Controllers;

use App\Field;
use App\Group;
use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function fields()
    {
        $fields= Field::withCount(['groups'])->get();
        return response()->json([
            "message" => "all fields",
            "data" => $fields
        ]);
    }

    public function allField()
    {
        $fields = Field::all();
        return response()->json([
            'message' => 'All fields',
            'data' => $fields
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->name;
        $field = Field::create(['name'=>$name]);
        return response()->json("Create field success");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
     {
         $field = Field::findOrFail($id);
         $field->delete();
//        $fields= Field::where('id','=',$id)->delete();
         return response("Delete field success");
     }
}

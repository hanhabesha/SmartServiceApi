<?php

namespace App\Http\Controllers;

use App\favMenuItems;
use Illuminate\Http\Request;

class FavMenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = favMenuItems::with('menuItem')->with('user')->get();
        return $model;
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
    public function store(Request $request)
    {
        $request['favId'] = uniqid('Fav-MI');
        $check = favMenuItems::create($request->all());
        return response()->json($check, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\favMenuItems  $favMenuItems
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return favMenuItems::where('userId', $userId)->with('menuItem')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\favMenuItems  $favMenuItems
     * @return \Illuminate\Http\Response
     */
    public function edit(favMenuItems $favMenuItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\favMenuItems  $favMenuItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favMenuItems $favMenuItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\favMenuItems  $favMenuItems
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$check = favMenuItems::find($id)->delete();

        return response()->json(["message" => "Fav Item SUccessfully Deleted"], 200);
        // return favMenuItems::where($id)->delete();
    }
}

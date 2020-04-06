<?php

namespace App\Http\Controllers;

use App\favGroupItems;
use Illuminate\Http\Request;

class FavGroupItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = favGroupItems::with('MenuItemGroup')->with('user')->get();
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
        $request['favId'] = uniqid('Fav-GI');
        $check = favGroupItems::create($request->all());
        return response()->json($check, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\favGroupItems  $favGroupItems
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return favGroupItems::where('userId', $userId)->with('MenuItemGroup')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\favGroupItems  $favGroupItems
     * @return \Illuminate\Http\Response
     */
    public function edit(favGroupItems $favGroupItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\favGroupItems  $favGroupItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favGroupItems $favGroupItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\favGroupItems  $favGroupItems
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = favGroupItems::find($id)->delete();
        return response()->json(["message" => "Fav Group Item SUccessfully Deleted"], 200);
    }
}

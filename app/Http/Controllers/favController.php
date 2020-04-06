<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class favController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favItems = new FavMenuItemsController;
        $favGroupItems = new FavGroupItemsController;
        $favServiceProviders = new FavServiceProvidersController;

        $model = ['favItems' => $favItems->index(),
            'favGroupItems' => $favGroupItems->index(),
            'favServiceProviders' => $favServiceProviders->index()];
        return response()->json($model, 200);
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
        $favItems = new FavMenuItemsController;
        $favGroupItems = new FavGroupItemsController;
        $favServiceProviders = new FavServiceProvidersController;

        if ($request['fav_type'] == 'favItem') {
            return $favItems->store($request);
        } else if ($request['fav_type'] == 'favGroupItems') {
            return $favGroupItems->store($request);
        } else if ($request['fav_type'] == 'favServiecProviders') {
            return $favServiceProviders->store($request);
        }
        return response()->json(["message" => "something went wrong"], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
        $favItems = new FavMenuItemsController;
        $favGroupItems = new FavGroupItemsController;
        $favServiceProviders = new FavServiceProvidersController;

        $favItemsModel = $favItems->show($userid);
        $favGroupItemsModel = $favGroupItems->show($userid);
        $favServiceProvidersModel = $favServiceProviders->show($userid);

        $model = [
            'favItem' => $favItemsModel,
            'favGroupItems' => $favGroupItemsModel,
            'favServiecProviders' => $favGroupItemsModel,
        ];
        return response()->json($model, 200);
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
        $favItems = new FavMenuItemsController;
        $favGroupItems = new FavGroupItemsController;
        $favServiceProviders = new FavServiceProvidersController;
        $favId = substr($id, 0, 6);
        // return response()->json(["id" => $favId], 200);
        switch ($favId) {
            case 'Fav-MI':
                return $favItems->destroy($id);
                break;
            case 'Fav-GI':
                # code...
                break;
            case 'Fav-SP':
                # code...
                break;
            default:
                # code...
                break;
        }
        return $favId;

    }
}

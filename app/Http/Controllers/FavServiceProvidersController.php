<?php

namespace App\Http\Controllers;

use App\favServiceProviders;
use Illuminate\Http\Request;

class FavServiceProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = favServiceProviders::with('serviceProvider')->with('user')->get();
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
        $request['favId'] = uniqid('Fav-SP');
        $check = favServiceProviders::create($request->all());
        return response()->json($check, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\favServiceProviders  $favServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return favServiceProviders::where('userId', $userId)->with('serviceProvider')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\favServiceProviders  $favServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function edit(favServiceProviders $favServiceProviders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\favServiceProviders  $favServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favServiceProviders $favServiceProviders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\favServiceProviders  $favServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function destroy(favServiceProviders $favServiceProviders)
    {
        //
    }
}

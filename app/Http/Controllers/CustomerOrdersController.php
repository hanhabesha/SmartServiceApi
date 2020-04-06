<?php

namespace App\Http\Controllers;

use App\CustomerOrders;
use Illuminate\Http\Request;

class CustomerOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $data = $request->all();
        $data['orderId'] = uniqid();
        CustomerOrders::create($data);
        $message = [
            'message' => 'successfully stored',
        ];
        return response()->json($message, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerOrders  $customerOrders
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerOrders $customerOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerOrders  $customerOrders
     * @return \Illuminate\Http\Response
     */
    public function edit($spsId)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerOrders  $customerOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerOrders $customerOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerOrders  $customerOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerOrders $customerOrders)
    {
        //
    }
}

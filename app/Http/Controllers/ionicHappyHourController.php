<?php

namespace App\Http\Controllers;

use App\HappyHourItem;
use App\HappyHourItemGroup;
use App\HappyHourMenu;
use Illuminate\Http\Request;

class ionicHappyHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hHItemModel = HappyHourItem::where('recent', true)->with('serviceProvider')->with('serviceProvider.serviceCatagory')->with('menuItems')->orderBy('created_at', 'desc')->get();
        $hHItemModel = $hHItemModel->filter(function ($value) {
            return $value->isValid;
        });
        $hHGroupModel = HappyHourItemGroup::with('serviceProvider.serviceCatagory')->with('menuItemsGroup')->orderBy('created_at', 'desc')->get();
         $hHGroupModel = $hHGroupModel->filter(function ($value) {
            return $value->isValid;
        });
        $hHMenuModel = HappyHourMenu::where('recent', true)->with('serviceProvider')->orderBy('created_at', 'desc')->get();
         $hHMenuModel = $hHMenuModel->filter(function ($value) {
            return $value->isValid;
        });
        $model = [
            'happyHourItem' => $hHItemModel,
            'happyHourItemGroup' => $hHGroupModel,
            'happyHourMenu' => $hHMenuModel,
        ];
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
        //
    }
}

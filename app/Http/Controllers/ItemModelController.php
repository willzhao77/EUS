<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemModel;
use App\Manufacturer;

class ItemModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('/device/showitemmodel')->with('itemmodels', ItemModel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('/device/createmodel')->with('manus', Manufacturer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'modelname' => 'required',
          'manufacturer'=> 'required',
      ]);



      $itemmodel = new ItemModel;
      $itemmodel->model_name = $request->get('modelname');
      $itemmodel->manufacturer_id = $request->get('manufacturer');



      if ($itemmodel->save())
      {
        return redirect('itemmodel');
      } else {
        return redirect()->back()->withInput()->withErrors('Save Type faild');
      }
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
      return view("/device/edititemmodel")->with('itemmodel', ItemModel::find($id))->with('manus', Manufacturer::all());
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
      $itemmodel = ItemModel::find($id);
      $itemmodel->model_name = $request->get('modelname');
      $itemmodel->manufacturer_id = $request->get('manufacturer');

      if ($itemmodel->save()) {
            return redirect('itemmodel');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ItemModel::find($id)->delete();
      return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('/device/showmanufacturer')->with('manus', Manufacturer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('/device/createmanufacturer');
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
          'manufacturername' => 'required',
      ]);



      $manu = new Manufacturer;
      $manu->manufacturer_name = $request->get('manufacturername');



      if ($manu->save())
      {
        return redirect('manufacturer');
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
      return view("/device/editmanufacturer")->with('manu', Manufacturer::find($id));
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
      $manu = Manufacturer::find($id);
      $manu->manufacturer_name = $request->get('manufacturername');


      if ($manu->save()) {
            return redirect('manufacturer');
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
      Manufacturer::find($id)->delete();
      return redirect()->back();
    }
}

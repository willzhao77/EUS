<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Type;
use App\ItemModel;
use App\Manufacturer;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('/device/showdevice')->with('devices', Device::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('/device/createdevice')->with('types', Type::all())->with('itemmodels', ItemModel::all())->with('manus', Manufacturer::all());
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
          'devicename' => 'required',
          'devicetype'=> 'required',
          'itemmodel'=> 'required',
          'devicesn'=> 'required',
          'manufacturer'=> 'required',
          'deviceuser'=> 'required',

      ]);



      $device = new Device;
      $device->device_name = $request->get('devicename');
      $device->device_type = $request->get('devicetype');
      $device->device_model = $request->get('itemmodel');
      $device->device_sn = $request->get('devicesn');
      $device->device_manufacturer = $request->get('manufacturer');
      $device->device_user = $request->get('deviceuser');
      $device->device_note = $request->get('devicenote');


      if ($device->save())
      {
        return redirect('device');
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

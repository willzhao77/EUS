<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Type;
use App\ItemModel;
use App\Manufacturer;
use DB;

class DeviceController extends Controller
{

    // used for dependent dropdown
    //response AJAX reuqests
    public function getItemModels($manu_id, $type_id)
    {
      $itemmodels = DB::table("model")->where("manufacturer_id",$manu_id)->where("model_type",$type_id)->pluck("model_name","model_id");
      return json_encode($itemmodels);
    }


    public function filter(Request $request)
    {

    // $products=DB::table('device')->where('device_type','=',$request->devicetype)->get();
    $products=DB::table('device')
            ->join('type', 'device.device_type', '=', 'type.type_id')
            ->join('manufacturer', 'device.device_manufacturer', '=', 'manufacturer.manufacturer_id')
            ->join('model', 'device.device_model', '=', 'model.model_id')
            ->select('device.device_name', 'type.type_name', 'model.model_name', 'device.device_sn', 'manufacturer.manufacturer_name','device.device_user', 'device.device_name')
            ->where('device_type','=',$request->devicetype)->get();



    return json_encode($products);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('/device/showdevice')->with('types', Type::all())->with('devices', Device::paginate(10));
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
      //get related type ID and device_manufacturer ID
      $device_details = Device::find($id);
      $device_type = $device_details->device_type;
      $device_manu= $device_details->device_manufacturer;

      //return related model (where multiple AND condition)
      return view("/device/editdevice")->with('device', $device_details)->with('manus', Manufacturer::all())->with('types', Type::all())
                                        // ->with('itemmodels', ItemModel::all());
                                        // ->with('itemmodels', ItemModel::where('model_type', '=',$device_type)
                                        ->with('itemmodels', ItemModel::where(['model_type' =>$device_type,'manufacturer_id' =>$device_manu])
                                        ->get());
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

      $this->validate($request, [
          'devicename' => 'required',
          'devicetype'=> 'required',
          'itemmodel'=> 'required',
          'devicesn'=> 'required',
          'manufacturer'=> 'required',
          'deviceuser'=> 'required',

      ]);


      $device = Device::find($id);
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
        return redirect()->back()->withInput()->withErrors('Update Type faild');
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
      Device::find($id)->delete();
      return redirect()->back();
    }
}

@extends('frame')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="">
  <form action="{{ url('device/'.$device->device_id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">Device Name</label><input type="text" name="devicename" value="{{ $device->device_name }}">
    </div>

    <div class="">
      <select name="devicetype">
        @foreach ($types as $type)

        <option value="{{ $type->type_id }}" {{ $type->type_id == $device->device_type ? 'selected' :'' }}>{{ $type->type_name }}</option>

        @endforeach
      </select>
    </div>


    <div class="">
      <select name="itemmodel">
        @foreach ($itemmodels as $itemmodel)

        <option value="{{ $itemmodel->model_id }}" {{ $itemmodel->model_id == $device->device_model ? 'selected' :'' }}>{{ $itemmodel->model_name }}</option>

        @endforeach
      </select>
    </div>

    <div class="">
      <label for="">Device SN</label><input type="text" name="devicesn" value="{{ $device->device_sn }}">
    </div>

    <div class="">
      <select name="manufacturer">
        @foreach ($manus as $manu)

        <option value="{{ $manu->manufacturer_id }}" {{ $manu->manufacturer_id == $device->device_manufacturer ? 'selected' :'' }}>{{ $manu->manufacturer_name }}</option>

        @endforeach
      </select>
    </div>

    <div class="">
      <label for="">Device User</label><input type="text" name="deviceuser" value="{{ $device->device_user }}">
    </div>

    <div class="">
      <label for="">Device Note</label><input type="text" name="devicenote" value="{{ $device->device_note }}">
    </div>

    <input type="hidden" name="itemmodel_id" class="form-control" style="width: 300px;" value="{{ $itemmodel->model_id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>










<script type="text/javascript">
    jQuery(document).ready(function ()
    {

          jQuery('select[name="devicetype"]').on('change',function(){
            // jQuery('select[name="itemmodel"]').empty();
            var manuID = jQuery('select[name="manufacturer"]').val();
            var typeID = jQuery(this).val();
            if(manuID)
            {
               jQuery.ajax({
                  url : '/device/getitemmodels/' + manuID +'/' + typeID ,
                  type : "GET",
                  dataType : "json",
                  success:function(data)
                  {
                     console.log(data);
                     jQuery('select[name="itemmodel"]').empty();
                     jQuery.each(data, function(key,value){
                        $('select[name="itemmodel"]').append('<option value="'+ key +'">'+ value +'</option>');
                     });
                  }
               });
            }
            else
            {
               $('select[name="itemmodel"]').empty();
            }

          });



            jQuery('select[name="manufacturer"]').on('change',function(){
               var manuID = jQuery(this).val();
               var typeID = jQuery('select[name="devicetype"]').val();
               if(manuID)
               {
                  jQuery.ajax({
                     url : '/device/getitemmodels/' + manuID +'/' + typeID ,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="itemmodel"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="itemmodel"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="itemmodel"]').empty();
               }
            });
    });
    </script>




@endsection

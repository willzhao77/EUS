@extends('frame')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


<div class="">
  <form action="{{ url('device') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">New Device Name</label><label for="" style="color:red">*</label><input type="text" name="devicename" value="">
    </div>

    <div class="">
      <select name="devicetype">
        @foreach ($types as $type)

        <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>

        @endforeach
      </select>
      <label for="" style="color:red">*</label>
    </div>

    <div class="">
      <select name="itemmodel">
        <option>--Item Model--</option>
        @foreach ($itemmodels as $itemmodel)

        <option value="{{ $itemmodel->model_id }}">{{ $itemmodel->model_name }}</option>

        @endforeach
      </select>
      <label for="" style="color:red">*</label>
    </div>


    <div class="">
      <label for="">Device S/N</label><label for="" style="color:red">*</label><input type="text" name="devicesn" value="">
    </div>


    <div class="">
      <select name="manufacturer">
        <option value="">--- Select Manufacturer ---</option>
        @foreach ($manus as $manu)

        <option value="{{ $manu->manufacturer_id }}">{{ $manu->manufacturer_name }}</option>

        @endforeach
      </select>
      <label for="" style="color:red">*</label>
    </div>

    <div class="">
      <label for="">User</label><label for="" style="color:red">*</label><input type="text" name="deviceuser" value="">
    </div>

    <div class="">

      <label for="">Notes</label><label for="" style="color:red">*</label><input type="text" name="devicenote" value="">
    </div>


    <button class="btn btn-lg btn-info">Add New</button>
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
                  url : './getitemmodels/' + manuID +'/' + typeID ,
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
                     url : './getitemmodels/' + manuID +'/' + typeID ,
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

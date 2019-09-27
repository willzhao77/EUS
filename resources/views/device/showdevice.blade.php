@extends('frame')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <div class="">

      <div class="">
        <label for="">Device Name</label><input type="text" id="devicename" value="">
      </div>
      <div class="">
        <label for="">Deivce Type</label><input type="text" id="devicetype" value="">
      </div>
      <!-- <div class="">
        <label for="">Deivce Model</label><input type="text" id="devicemodel" value="">
      </div>
        <div class="">
        <label for="">Deivce SN</label><input type="text" id="devicesn" value="">
      </div>
      <div class="">
        <label for="">Brand</label><input type="text" id="devicebrand" value="">
      </div>
      <div class="">
        <label for="">User</label><input type="text" id="deviceuser" value="">
      </div>
      <div class="">
        <label for="">Notes</label><input type="text" id="devicenotes" value="">
      </div> -->
      <button class="btn btn-lg btn-info" id="search">Search</button>

    </div>


  <div class="">
    <label for="">Filter</label>
    <select name="itemtype" id='itemtype'>
      <option value="0">All</option>
      @foreach ($types as $type)

      <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>

      @endforeach
    </select>
  </div>
  <div class="">
    <a href="{{ url('/device/create') }}" class="btn btn-lg btn-primary">New Device</a>
    <div class="content1">
      @include('/device/presult')
    </div>


  </div>





  <script type="text/javascript">



    $(document).on('click', '.pagination a',function(e)
    {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        getProducts(page);
        // console.log(page);
    })

    function getProducts(page){
      var typeid = jQuery('select[name="itemtype"]').val();
      $.ajax({
        url:'./device/filter?page=' + page,
        data:{'devicetype': typeid},
      }).done(function(data){
        // console.log(data);
        $('.content1').html(data);
      });
    }




  $('#itemtype').on('change',function(){
    //num used for list number

    $value=$(this).val();

    $.ajax({
    type : 'get',
    url : './device/filter',
    data:{'devicetype':$value},
    success:function(data){

      console.log(data);
        $('.content1').html(data);


  }
  });
  })







  $(document).on('click', '#search', function(){
    //num used for list number
    var devicename = $('#devicename').val();
    var devicetype= $('#devicetype').val();


    $.ajax({
    type : 'get',
    url : './device/search',
    data:{'devicename':devicename, 'devicetype':devicetype},
    success:function(data){

      console.log(data);
        $('.content1').html(data);


  }
  });
  })









  </script>




@endsection

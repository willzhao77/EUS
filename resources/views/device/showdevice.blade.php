@extends('frame')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>



  <div class="">
    <label for="">Filter</label>
    <select name="devicetype" id='devicetype'>
      <option value="0">All</option>
      @foreach ($types as $type)

      <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>

      @endforeach
    </select>
  </div>
  <div class="">
    <a href="{{ url('/device/create') }}" class="btn btn-lg btn-primary">Create Model</a>
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
      var typeid = jQuery('select[name="devicetype"]').val();
      $.ajax({
        url:'/device/filter?page=' + page,
        data:{'devicetype': typeid},
      }).done(function(data){
        // console.log(data);
        $('.content1').html(data);
      });
    }




  $('#devicetype').on('change',function(){
    //num used for list number


    $value=$(this).val();

    $.ajax({
    type : 'get',
    url : '/device/filter',
    data:{'devicetype':$value},
    success:function(data){

      console.log(data);
        $('.content1').html(data);


  }
  });
  })
  </script>




@endsection

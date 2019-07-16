@extends('frame')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>



  <div class="">
    <label for="">Filter</label>
    <select name="devicetype" id='devicetype'>
      @foreach ($types as $type)

      <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>

      @endforeach
    </select>
  </div>
  <div class="">
    <a href="{{ url('/device/create') }}" class="btn btn-lg btn-primary">Create Model</a>
    <table border = "1px" class="table table-striped">

        <thead>
        <th>ID</th>
        <th>Device Name</th>
        <th>Device Type</th>
        <th>Device Model</th>
        <th>Device S/N</th>
        <th>Brand</th>
        <th>User</th>
        <th>Notes</th>
        <th>Modify</th>
        </thead>

      <tbody>
        <?php $id = 1; ?>
        @foreach ($devices as $device)
        <tr>
          <td>
            <P>{{ $id++ }}</P>
          </td>
          <td>
            <P>{{ $device->device_name }}</P>
          </td>
          <td>
            <P>{{ $device->type->type_name }}</P>
          </td>
          <td>
            <P>{{ $device->itemmodel->model_name }}</P>
          </td>
          <td>
            <P>{{ $device->device_sn }}</P>
          </td>
          <td>
            <P>{{ $device->manu->manufacturer_name }}</P>
          </td>
          <td>
            <P>{{ $device->device_user }}</P>
          </td>
          <td>
            <P>{{ $device->device_note }}</P>
          </td>
          <td>
            <!-- <input type="button" onclick="location.href='editnews';" value="Edit" /> -->
            <a href="{{ url('device/'.$device->device_id.'/edit') }}" class="btn btn-success">Edit</a>
            <form action="{{ url('device/'.$device->device_id) }}" method="POST" style="display: inline;">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
            </form>
          </td>
        </tr>


      @endforeach
      </tbody>
    </table>
    {{ $devices->links() }}
  </div>





  <script type="text/javascript">

  $('#devicetype').on('change',function(){
    //num used for list number
    var num = 1;

    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '/device/filter/',
    data:{'devicetype':$value},
    success:function(data){
      jQuery('tbody').empty();
      console.log(data);
      jQuery.each($.parseJSON(data), function(key,value){
        $('tbody').append(`
          <tr>
              <td>
                <p>`+ num++ +`</p>
              </td>
              <td>
                <p>`+ value.device_name + `</p>
              </td>
              <td>
                <p>`+ value.type_name + `</p>
              </td>
              <td>
                <p>`+ value.model_name + `</p>
              </td>
              <td>
                <p>`+ value.device_sn + `</p>
              </td>
              <td>
                <p>`+ value.manufacturer_name + `</p>
              </td>
              <td>
                <p>`+ value.device_user + `</p>
              </td>
              <td>
                <p>`+ value.device_note + `</p>
              </td>
              <td>
                <!-- <input type="button" onclick="location.href='editnews';" value="Edit" /> -->
                <a href="http://localhost:8000/device/` + value.device_id +`/edit" class="btn btn-success">Edit</a>
                <form action="http://localhost:8000/device/` + value.device_id +`" method="POST" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
              </td>
          </tr>`);
        });

  }
  });
  })
  </script>




@endsection

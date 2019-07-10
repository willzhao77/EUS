@extends('frame')

@section('content')
  <div class="">
    <a href="{{ url('/device/create') }}" class="btn btn-lg btn-primary">Create Model</a>
    <table border = "1px">
      <tr>
        <th>Device ID</th>
        <th>Device Name</th>
        <th>Device Type</th>
        <th>Device Model</th>
        <th>Device S/N</th>
        <th>Manufacturer Name</th>
        <th>User</th>
        <th>Notes</th>
        <th>Modify</th>
      </tr>
      @foreach ($devices as $device)
      <tr>
        <td>
          <P>{{ $device->device_id }}</P>
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
    </table>

  </div>
@endsection

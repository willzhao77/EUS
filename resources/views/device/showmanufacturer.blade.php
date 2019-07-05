@extends('frame')

@section('content')
  <div class="">
    <a href="{{ url('/manufacturer/create') }}" class="btn btn-lg btn-primary">Create Manufacturer</a>
    <table border = "1px">
      <tr>
        <th>Manufacturer ID</th>
        <th>Manufacturer Name</th>
        <th>Modify</th>
      </tr>
      @foreach ($manus as $manu)
      <tr>
        <td>
          <P>{{ $manu->manufacturer_id }}</P>
        </td>
        <td>
          <P>{{ $manu->manufacturer_name }}</P>
        </td>
        <td>
          <!-- <input type="button" onclick="location.href='editnews';" value="Edit" /> -->
          <a href="{{ url('manufacturer/'.$manu->manufacturer_id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('manufacturer/'.$manu->manufacturer_id) }}" method="POST" style="display: inline;">
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

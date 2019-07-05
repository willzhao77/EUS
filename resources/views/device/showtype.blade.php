@extends('frame')

@section('content')
  <div class="">
    <a href="{{ url('/type/create') }}" class="btn btn-lg btn-primary">Create Type</a>
    <table border = "1px">
      <tr>
        <th>Type ID</th>
        <th>Type Name</th>
        <th>Modify</th>
      </tr>
      @foreach ($types as $type)
      <tr>
        <td>
          <P>{{ $type->type_id }}</P>
        </td>
        <td>
          <P>{{ $type->type_name }}</P>
        </td>
        <td>
          <!-- <input type="button" onclick="location.href='editnews';" value="Edit" /> -->
          <a href="{{ url('type/'.$type->type_id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('type/'.$type->type_id) }}" method="POST" style="display: inline;">
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

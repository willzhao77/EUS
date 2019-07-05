@extends('frame')

@section('content')
  <div class="">
    <a href="{{ url('/itemmodel/create') }}" class="btn btn-lg btn-primary">Create Model</a>
    <table border = "1px">
      <tr>
        <th>Model ID</th>
        <th>Model Name</th>
        <th>Manufacturer Name</th>
        <th>Modify</th>
      </tr>
      @foreach ($itemmodels as $itemmodel)
      <tr>
        <td>
          <P>{{ $itemmodel->model_id }}</P>
        </td>
        <td>
          <P>{{ $itemmodel->model_name }}</P>
        </td>
        <td>
          <P>{{ $itemmodel->manu->manufacturer_name }}</P>
        </td>
        <td>
          <!-- <input type="button" onclick="location.href='editnews';" value="Edit" /> -->
          <a href="{{ url('itemmodel/'.$itemmodel->model_id.'/edit') }}" class="btn btn-success">Edit</a>
          <form action="{{ url('itemmodel/'.$itemmodel->model_id) }}" method="POST" style="display: inline;">
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

@extends('frame')
@section('content')

<div class="">
  <form action="{{ url('itemmodel/'.$itemmodel->model_id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">Model Name</label><input type="text" name="typename" value="{{ $itemmodel->model_name }}">
    </div>
    <div class="">
      <select name="manufacturer">
        @foreach ($manus as $manu)

        <option value="{{ $manu->manufacturer_id }}" {{ $manu->manufacturer_id == $itemmodel->manufacturer_id ? 'selected' :'' }}>{{ $manu->manufacturer_name }}</option>

        @endforeach
      </select>
    </div>


    <input type="hidden" name="itemmodel_id" class="form-control" style="width: 300px;" value="{{ $itemmodel->model_id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection

@extends('frame')
@section('content')

<div class="">
  <form action="{{ url('itemmodel') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">News Model</label><input type="text" name="modelname" value="">
    </div>

    <div class="">
      <select name="manufacturer">
        @foreach ($manus as $manu)

        <option value="{{ $manu->manufacturer_id }}">{{ $manu->manufacturer_name }}</option>

        @endforeach
      </select>
    </div>


    <button class="btn btn-lg btn-info">Add New</button>
  </form>
</div>

@endsection

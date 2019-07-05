@extends('frame')
@section('content')

<div class="">
  <form action="{{ url('manufacturer/'.$manu->manufacturer_id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">News Title</label><input type="text" name="manufacturername" value="{{ $manu->manufacturer_name }}">
    </div>
    <input type="hidden" name="manufacturer_id" class="form-control" style="width: 300px;" value="{{ $manu->manufacturer_id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection

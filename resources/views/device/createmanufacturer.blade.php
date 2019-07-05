@extends('frame')
@section('content')

<div class="">
  <form action="{{ url('manufacturer') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">News Manufacturer</label><input type="text" name="manufacturername" value="">
    </div>

    <button class="btn btn-lg btn-info">Add New</button>
  </form>
</div>

@endsection

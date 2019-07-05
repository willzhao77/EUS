@extends('frame')
@section('content')

<div class="">
  <form action="{{ url('type') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="">
      <label for="">News Type</label><input type="text" name="typename" value="">
    </div>

    <button class="btn btn-lg btn-info">Add New</button>
  </form>
</div>

@endsection

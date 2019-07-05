@extends('frame')
@section('content')

<div class="">
  <form action="{{ url('type/'.$type->type_id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}
    <div class="">
      <label for="">News Title</label><input type="text" name="typename" value="{{ $type->type_name }}">
    </div>
    <input type="hidden" name="type_id" class="form-control" style="width: 300px;" value="{{ $type->type_id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
  </form>
</div>

@endsection

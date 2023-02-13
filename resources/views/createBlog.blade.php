@extends('layout.master')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>Success</strong> {{$message}}
    </div>
@endif
<form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="from-group">
        <input type="text" name="title" id="" placeholder="Title" class="form-controller">
        <small class="text-danger">{{$errors->first('title')}}</small>
    </div>
    <div class="from-group">
        <input type="file" name="image" id="" class="form-controller">
        <small class="text-danger">{{$errors->first('image')}}</small>
    </div>
    <div class="from-group">
        <textarea name="heading" id="" placeholder="Heading" class="form-controller"></textarea>
        <small class="text-danger">{{$errors->first('heading')}}</small>
    </div>
    <div class="from-group">
        <textarea name="body" id="" placeholder="body" class="form-controller"></textarea>
        <small class="text-danger">{{$errors->first('body')}}</small>
    </div>
    <input type="submit">
</form>
@stop

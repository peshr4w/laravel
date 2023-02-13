@extends('layout.master')
@section('content')
<div class="container">
    <h2>Update student</h2>
    <form action="{{route('students.update',$students->id)}}" class="mt-3" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Student name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$students->name}}">
           <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <input type="submit" class="btn btn-primary mt-3">
    </form>
</div>
@stop

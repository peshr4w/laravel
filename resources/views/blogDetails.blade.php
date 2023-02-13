@extends('layout.master')
@section('content')
<h1>{{$blog->title}}</h1>
<img src="\images\{{$blog->image}}" alt="" width="200px">
<h5>{{$blog->heading}}</h3>
<p>{{$blog->body}}</p>
@stop

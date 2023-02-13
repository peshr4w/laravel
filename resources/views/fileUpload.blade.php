@extends('layout.master')
@section('content')
<div class="container pt-5">
    <form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="path" id="image">
        <button class="btn btn-sm btn-primary">Send</button>
        <small class="text-danger">{{$errors->first('path')}}</small>
        <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"><span id="persent"></span></div>
        </div>
    </form>
    <div class="images">
        @foreach ($images as $image)
        <div class="image">
            <img src="{{$image->path}}" alt="{{$image->path}}">
        </div>
        @endforeach
    </div>
</div>
<script>
    $(function () {
        $('form').ajaxForm({
           beforeSend : ()=>{
            let persent = 0;
           },
           uplpadFileProgress : (e,pos,total,persentComplete)=>{
            let persent = persentComplete;
            $('#persent').html(persent)
            $('.progress-bar').css('width','%'+persent ,()=>{
            return $(this).attr('area-valuenow',persent)+'%';
            })
           },
           complete: (xhr)=>{
            console.log('file uploaded');
           }
        })
      });
</script>
@stop

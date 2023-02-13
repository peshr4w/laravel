@extends('layout.master')
@section('content')
<div class="container">
    <div class="colAndRow">
        <input type="number" name="" id="row" min="1">
        <input type="number" name="" id="col" min="1">
    </div>
    <table class="table-bordered" id="table">

    </table>
</div>
<script>
      let table = document.getElementById('table')
      let rows = document.getElementById('row')
      let cols = document.getElementById('col')




</script>
@stop

@extends('layout.master')
@section('content')
<div class="container pt-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success</strong> {{$message}}
    </div>
    @endif
    @if ($message = Session::get('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success</strong> {{$message}}
    </div>
    @endif
    @if ($message = Session::get('updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success</strong> {{$message}}
    </div>
    @endif
    <h2>Add student</h2>
    <form action="{{route('students.create')}}" class="mt-3" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div class="form-group mb-3">
            <label for="name" class="form-label">Student name</label>
            <input type="text" name="name" id="name" class="form-control">
            <small class="text-danger">{{$errors->first('name')}}</small>
        </div>

        <input type="submit" class="btn btn-primary mt-3">
    </form>
    <table class="table table-bordered mt-5">
        <tr>
            <th>IDi <i class="fa-solid fa-key"></i> </th>
            <th>Name</th>
            <th>Image</th>
            <th>Lessons</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>
                <img src="{{$student->image}}" alt="{{$student->image}}" width="100px">
            </td>
            <td>
                @foreach ($student->lessons as $lesson)
                {{$lesson->name}}
                @endforeach
            </td>
            <td>
                <form action="{{route('students.destroy',$student->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
            <td>
                <form action="{{route('students.edit', $student->id)}}" method="get">
                    @csrf
                    <button class="btn btn-primary btn-sm">Edit</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm">
            <li class="page-item
            @isset($min_class)
        {{$min_class}}
        @endisset ">
                <a class="page-link" href="{{route('students.show',$id-1)}}" aria-label="Previous">
                    <span aria-hidden="true">Previous</span>
                </a>
            </li>
            @for ($i=0; $i<=$pagers; $i++) <li class="page-item"><a class="page-link"
                    href="{{route('students.show',$i)}}">{{$i+1}}</a></li>
                @endfor

                <li class="page-item
                @isset($min_class)
                {{$max_class}}
                @endisset">
                    <a class="page-link" href="{{route('students.show',$id+1)}}" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>
<div class="container cards mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="quote"><Object data="./svg/quote.svg"></Object></div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nihil
                        similique, distinctio nesciunt ipsum illo totam, odio cumque repellendus magni doloremque!
                        Quibusdam atque accusantium non adipisci hic voluptates, quo vel.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="quote"><Object data="./svg/quote.svg"></Object></div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nihil
                        similique, distinctio nesciunt ipsum illo totam, odio cumque repellendus magni doloremque!
                        Quibusdam atque accusantium non adipisci hic voluptates, quo vel.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="quote"><Object data="./svg/quote.svg"></Object></div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nihil
                        similique, distinctio nesciunt ipsum illo totam, odio cumque repellendus magni doloremque!
                        Quibusdam atque accusantium non adipisci hic voluptates, quo vel.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="quote"><Object data="./svg/quote.svg"></Object></div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nihil
                        similique, distinctio nesciunt ipsum illo totam, odio cumque repellendus magni doloremque!
                        Quibusdam atque accusantium non adipisci hic voluptates, quo vel.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="quote"><Object data="./svg/quote.svg"></Object></div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nihil
                        similique, distinctio nesciunt ipsum illo totam, odio cumque repellendus magni doloremque!
                        Quibusdam atque accusantium non adipisci hic voluptates, quo vel.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="quote"><Object data="./svg/quote.svg"></Object></div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nihil
                        similique, distinctio nesciunt ipsum illo totam, odio cumque repellendus magni doloremque!
                        Quibusdam atque accusantium non adipisci hic voluptates, quo vel.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

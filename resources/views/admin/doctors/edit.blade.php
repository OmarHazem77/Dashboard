@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Products</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">Add New</a></li>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{Session::get('msg')}}
            </div>
        @endif
        <form class="form-horizontal" action="{{route('admin.doctors.update',$doctors->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')

            <div class="card-body">

                <div class="form-group row">
                    <label
                        for="name"
                        class="col-sm-3 text-end control-label col-form-label "
                    >name</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ $doctors->name}}"
                        />
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label "
                    >email</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ $doctors->email}}"
                        />
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label
                        for="photo"
                        class="col-sm-3 text-end control-label col-form-label "
                    >photo</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="file"
                            class="form-control "
                            id="photo"
                            name="photo"
                            value=""

                        />


                    </div>
                </div>
                <div class="form-group row">
                    <label
                        for="section"
                        class="col-sm-3 text-end control-label col-form-label "
                    >Department</label
                    >
                    <div class="col-sm-9">
                        <select class="form-control @error('department') is-invalid @enderror" name="department">
                            @foreach($departments as $department)
                                <option value="{{$department->dep_id}}">{{$department->dep_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

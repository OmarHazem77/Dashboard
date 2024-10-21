@extends('admin.layouts.app')
@section('breadcrumb')

    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">doctors</h4>
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
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{route('admin.doctors.store')}}" enctype="multipart/form-data" method="Post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group row">
                                <label
                                    for="ssn"
                                    class="col-sm-3 text-end control-label col-form-label"
                                >ID</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control @error('code') is-invalid @enderror"
                                        id="ID"
                                        name="ID"
                                        value="{{$doctors->id}}"
                                    />
                                    @error('code')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-sm-3 text-end control-label col-form-label"
                                >name</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        value="{{$doctors->name}}"
                                    />
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-sm-3 text-end control-label col-form-label"
                                >Email</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror "
                                        id="email"

                                        name="email"
                                        value="{{$doctors->email}}"
                                    />
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-sm-3 text-end control-label col-form-label"
                                >tablet</label
                                >
                            <div class="col-sm-9">
                                <input
                                    type="text"
                                    class="form-control @error('email') is-invalid @enderror "
                                    id="tablet"

                                    name="tablet"
                                    value="{{$doctors->tablet->tablet_name}}"
                                />
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                                <label
                                    for="photo"
                                    class="col-sm-3 text-end control-label col-form-label"
                                >photo</label
                                >
                                <div class="col-sm-9 text-start" style="margin-top:7px ">

                                      <img class="rounded" width="500"  src="{{asset('storage/'.$doctors->photo)}}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="department"
                                    class="col-sm-3 text-end control-label col-form-label"
                                >Department</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control @error('email') is-invalid @enderror "
                                        id="laptop"

                                        name="laptop"
                                        value="{{$doctors->department->dep_name}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

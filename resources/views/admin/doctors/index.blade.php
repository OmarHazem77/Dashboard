@extends('admin.layouts.app')
@section('breadcrumb')

    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Doctors</h4>
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
    <!-- End Bread crumb -->
@endsection
@section('content')
    <!-- Container fluid -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('msg'))
                        <div class="alert alert-danger">
                            {{Session::get('msg')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Doctors</h5>
                        <div class="table-responsive">
                            <table
                                id="zero_config"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>

                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email}}</td>
                                        <td>{{ $doctor->dep_id}}</td>
                                        <td>
                                            <a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn btn-outline-info">Edit</a>
                                            <a href="{{route('admin.doctors.show', $doctor->id)}}" class="btn btn-outline-success">Show</a>
                                            <form action="{{route('admin.doctors.destroy', $doctor->id)}}" class="d-inline " method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-outline-danger" value="Delete"  >
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->

    </div>
    <!-- End Container fluid -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by
        <a href="https://www.wrappixel.com">WrapPixel</a>.
    </footer>

@endsection


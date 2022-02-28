@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>

    <div class="row ">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

            </div>
            <div class="class-header">

                <a href="{{ route('departments.create') }}" class="float-right btn btn-primary btn-sm m-2">Create</a>
                <form class="form-inline p-2" method="get" action="{{ route('departments.index') }}">
                    <input class="form-control mr-sm-2 form-control-sm" name="search" type="search"
                        placeholder="Search by name" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0 btn-sm" type="submit">Search</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

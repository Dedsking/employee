@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="row ">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('warning'))
                    <div class="alert alert-danger">
                        {{ session('warning') }}
                    </div>
                @endif

            </div>
            <div class="class-header">

                <a href="{{ route('states.create') }}" class="float-right btn btn-primary btn-sm m-2">Create</a>
                <form class="form-inline p-2" method="get" action="{{ route('states.index') }}">
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
                            <th scope="col">Country Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $state->id }}</td>
                                <td>{{ $state->country->country_code }}</td>
                                <td>{{ $state->name }}</td>
                                <td>
                                    <a href="{{ route('states.edit', $state->id) }}"
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

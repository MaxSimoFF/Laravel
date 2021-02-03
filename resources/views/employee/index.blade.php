@extends('layout')
@section('title', 'Employees')
@section('style')
<style>
    nav[role=navigation] svg {
        width:30px;
    }
    nav[role=navigation] .flex.justify-between.flex-1{
        display:none;
    }
</style>
@stop
@section('content')
    <div class="container py-5">
        <header class="text-center text-dark">
            <h1 class="display-4">Employees Information</h1>
            @if (Session::has('success') || Session::has('error'))
                <div class="alert @if(Session::has('success')) alert-success @else alert-danger @endif w-50 mx-auto alert-dismissible fade show">
                    @if (Session::has('success'))
                        {{ Session::get('success') }}
                    @else
                        {{ Session::get('error') }}
                    @endif
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </header>
        <div class="row py-1">
            <div class="w-100">
                <div class="card rounded shadow border-0">
                    <a href="/" class="btn btn-link position-absolute right-0">
                        <i class="fa fa-chevron-left fa-lg fa-fw"></i>
                        Home
                    </a>
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <a href="/employee/create" class="btn btn-primary">Add New Employee</a><br><br>
                            <table id="example" class="table table-bordered table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First_name</th>
                                        <th>Last_name</th>
                                        <th>Email_address</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $emp)
                                        <tr>
                                            <td>{{ $emp->id }}</td>
                                            <td>{{ $emp->first_name }}</td>
                                            <td>{{ $emp->last_name }}</td>
                                            <td>{{ $emp->email_address }}</td>
                                            <td>{{ $emp->created_at }}</td>
                                            <td>{{ $emp->updated_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <form action="/employee/{{ $emp->id }}" method="post" class="col-md-6">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="/employee/{{ $emp->id }}/edit"
                                                        class="ml-1 btn btn-info">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@section('style')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        html,
        body {
            display: flex;
            justify-content: center;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
        }

        .icon {
            font-size: 110px;
            display: flex;
            justify-content: center;
            color: #4286f4;
        }

    </style>
@endsection

@section('title', 'Edit Employee')
@section('content')
    <div class="container">
        <form action="/employee" method="post" class="my-3 border rounded w-75 mx-auto">
            @csrf
            <a href="{{ Route('employee.index') }}" class="btn btn-link"><i class="fa fa-chevron-left fa-lg"></i></a>
            <h1 class="text-center text-dark">Add New Employee</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
                <div class="row px-3 py-3">

                    <div class="col-md-12 my-1">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">First name</span>
                            </div>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                name="first_name" value="{{ old('first_name') }}">
                        </div>
                        @error('first_name') <span class="text-danger pl-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-md-12 my-1">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Last name</span>
                            </div>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                                name="last_name" value="{{ old('last_name') }}">
                        </div>
                        @error('last_name') <span class="text-danger pl-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-md-12 my-1">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Age</span>
                            </div>
                            <input class="form-control @error('age') is-invalid @enderror" type="text" name="age"
                                value="{{ old('age') }}">
                        </div>
                        @error('age') <span class="text-danger pl-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-md-12 my-1">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">E-mail Address</span>
                            </div>
                            <input class="form-control @error('email_address') is-invalid @enderror" type="email"
                                name="email_address" value="{{ old('email_address') }}">
                        </div>
                        @error('email_address') <span class="text-danger pl-2">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-50"><strong>Add Employee</strong></button>
                    </div>

                </div> {{-- End row --}}
        </form>
    </div>
@endsection

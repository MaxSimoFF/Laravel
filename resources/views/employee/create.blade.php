@extends('layout')
@section('title', 'Add Employee')

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

                    <x-form.employee.input name="first_name" span-text="First name"/>
                    <x-form.employee.input name="last_name" span-text="Last name"/>
                    <x-form.employee.input name="age" span-text="Age"/>
                    <x-form.employee.input name="email_address" span-text="E-mail Address" type="email"/>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-50"><strong>Add Employee</strong></button>
                    </div>

                </div>
        </form>
    </div>
@endsection

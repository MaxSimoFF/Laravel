@extends('layout')
@section('title', 'Edit Employee')
@section('style')
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
        <form action="/employee/{{ $employee->id }}" method="post" class="my-3 border rounded w-75 mx-auto">
            @csrf
            @method('put')
            <a href="{{ Route('employee.index') }}" class="btn btn-link"><i class="fa fa-chevron-left fa-lg"></i></a>
            <h1 class="text-center text-dark">Edit Employee Info</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="row px-3 py-3">

                <x-form.employee.input name="first_name" span-text="First name" :value="$employee->first_name" />
                <x-form.employee.input name="last_name" span-text="Last name" :value="$employee->last_name" />
                <x-form.employee.input name="email_address" span-text="E-mail address" :value="$employee->email_address" />

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg w-50"><strong>Save</strong></button>
                </div>
            </div>
        </form>
    </div>
@endsection

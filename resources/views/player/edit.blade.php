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
            font-size: 15px;
        }

        form {
            border: 5px solid #d6d6d6;
        }

        input[type=text],
        input[type=email] {
            width: 100%;
            padding: 16px 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .icon {
            font-size: 110px;
            display: flex;
            justify-content: center;
            color: #4286f4;
        }

        button {
            background-color: #4286f4;
            color: white;
            padding: 14px 0;
            margin: 10px 0;
            border: none;
            cursor: grab;
            width: 48%;
        }

        h1 {
            text-align: center;
            font-size: 18;
        }

        button:hover {
            opacity: 0.8;
        }

        .formcontainer {
            text-align: center;
            margin: 24px 50px 12px;
        }

        .container {
            padding: 16px 0;
            text-align: left;
        }
    </style>
@endsection
@section('title', 'Edit Employee')
@section('content')
<form action="/employee/{{ $employee->id }}" method="post">
    @csrf
    @method('put')
    <h1>Edit Employee Info</h1>
    <div class="icon">
        <i class="fas fa-user-circle"></i>
    </div>
    <div class="formcontainer">
        <div class="container">
            <label for="first_name"><strong>First name</strong></label>
            <input type="text" placeholder="Enter first name" name="first_name" value="{{ $employee->first_name }}" required>
            @error('first_name') <p style="color: red;">{{ $message }}</p>@enderror
            <label for="last_name"><strong>Last name</strong></label>
            <input type="text" placeholder="Enter Last name" name="last_name" value="{{ $employee->last_name }}" required>
            @error('last_name') <p style="color: red;">{{ $message }}</p>@enderror
            <label for="email_address"><strong>First name</strong></label>
            <input type="email" placeholder="Enter E-mail" name="email_address" value="{{ $employee->email_address }}" required>
            @error('email_address') <p style="color: red;">{{ $message }}</p>@enderror
        </div>
        <button type="submit"><strong>Save</strong></button>
    </div>
</form>
@endsection
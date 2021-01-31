@extends('layout')

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

@section('title', 'Add New Player')

@section('content')
    <div class="container">
        <form id="addPlayer" method="post" class="my-3 border rounded w-75 mx-auto">
            @csrf
            <a href="{{ Route('player.index') }}" class="btn btn-link"><i class="fa fa-chevron-left fa-lg"></i></a>
            <h1 class="text-center text-dark">Add New Player</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="row px-3 py-3">
                
                <div class="col-md-12 my-1 name">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name</span>
                        </div>
                        <input class="form-control"type="text" name="name">
                    </div>
                </div>

                <div class="col-md-12 my-1 age">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Age</span>
                        </div>
                        <input class="form-control" type="text" name="age">
                    </div>
                </div>

                <div class="col-md-12 my-1 address">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                        </div>
                        <input class="form-control" type="text" name="address">
                    </div>
                    @error('address') <span class="text-danger pl-2">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-12 my-1 image">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                        </div>
                        <input class="form-control" type="file" name="image">
                    </div>
                    @error('image') <span class="text-danger pl-2">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg w-50"><strong>Add Player</strong></button>
                </div>

            </div> {{-- End row --}}
        </form>
    </div> {{-- End Container --}}
@stop

@section('script')
    <script>
        var array = ['name', 'age', 'address', 'image'];
        $('#addPlayer').submit(function(e){
            e.preventDefault();
            var formData = new FormData($('#addPlayer')[0]);
            $.ajax({
                method: 'POST',
                enctype: 'multipart/form-data',
                url: "{{ Route('player.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    $('form .text-danger').remove();
                    $('input').removeClass('is-invalid in-valid');
                    if (data.success) {
                        $('.row').prepend('\
                        <div class="alert alert-success w-75 text-center mx-auto alert-dismissible fade show">\
                            '+data.success+'\
                            <button type="button" class="close" data-dismiss="alert">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
                        </div>');
                        $('input[name=name], input[name=age], input[name=address], input[name=image]').val('');
                        setTimeout(function(){
                            $('.alert.alert-success').remove();
                        },4500);
                    } else {
                        $.each(data, function(index, item){
                            $('.'+index).append('<span class="text-danger pl-2">' + item[0] + '</span>').find('input').addClass('is-invalid');
                        });
                        $('input').each(function(){
                            if (!$(this).hasClass('is-invalid')) {
                                $(this).addClass('is-valid');
                            }
                        });
                    }

                }
            });
            return false;
        });

       
    </script>
@stop


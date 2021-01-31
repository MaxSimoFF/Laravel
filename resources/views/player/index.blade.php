@extends('layout')
@section('title', 'PLayers')
@section('content')
    <div class="container py-5">
        <header class="text-center text-dark">
            <h1 class="display-4">Players Information</h1>
        </header>
        <div class="row py-1">
            <div class="w-100">
                <div class="card rounded shadow border-0 position-relative">
                    <a href="/" class="btn btn-link position-absolute right-0">
                        <i class="fa fa-chevron-left fa-lg fa-fw"></i>
                        Home
                    </a>
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <a href="{{ route('player.create') }}" class="btn btn-primary">Add New Player</a><br><br>
                            <table id="example" class="table table-bordered table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>age</th>
                                        <th>address</th>
                                        <th>image</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($players as $player)
                                        <tr>
                                            <td>{{ $player->id }}</td>
                                            <td>{{ $player->name }}</td>
                                            <td>{{ $player->age }}</td>
                                            <td>{{ $player->address }}</td>
                                            <td>
                                                <img width="64" height="64" src="images/players/{{ $player->image }}" onerror="this.onerror=null;this.src='images/players/default.jpg';" />
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <form class="deletePlayer" action="{{ Route('player.destroy', $player->id) }}" method="post" class="ml-2">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="{{ Route('player.edit', $player->id) }}"
                                                            class="ml-1 btn btn-info">Edit</a>
                                                    </div>
                                                </div>
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
    </div>
@endsection

@section('script')
    <script>
        $('.deletePlayer').submit(function(e){
            e.preventDefault();
            $('.alert').remove();
            var formData    = $(this).serialize(),
                form        = $(this);
            $.ajax({
                method: 'POST',
                url: form.attr('action'),
                data: formData,
                beforeSend: function() {
                    return confirm('You really need to delete this player?');
                },
                success: function(data) {
                    $('header').after('\
                    <div class="alert alert-'+ data.status +' w-75 text-center mx-auto alert-dismissible fade show">\
                        '+data.msg+'\
                        <button type="button" class="close" data-dismiss="alert">\
                            <span aria-hidden="true">&times;</span>\
                        </button>\
                    </div>');
                    if (data.status == 'success') {
                        form.parentsUntil('tbody').remove();
                    }
                }
            });
            return false;
        });

       
    </script>
@stop

@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3>Profil Użytkowników</h3></div>
            <div class="card-body">
                <div class="table-responsiv">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imię</th>
                                <th>email</th>
                                <th>Usuń Użytkownika</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $index => $item)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <form action="/admin/profile/{{$item->id}}/delete" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $profiles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3>Kraje umieszczone w bazie</h3></div>
            <div class="card-body">
                <div class="table-responsiv">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kraj</th>
                                <th>Flaga</th>
                                <th>Język urzędowy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $index => $item)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{$item->country_name}}</td>
                                <td><img src="http://www.geognos.com/api/en/countries/flag/{{$item->country_code}}.png" width="18" height="12"></td>
                                <td>{{$item->language}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $countries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

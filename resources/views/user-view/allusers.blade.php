@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3>Kraje i Użytkownicy</h3></div>
            <div class="card-body">
                <div class="table-responsiv">
                    @php
                        $num = 1;
                    @endphp
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Kraj / Flaga / Język Urzędowy</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                print_r($tablica)
                            @endphp --}}
                            @foreach ($tablica as $index => $item)
                            <tr>
                                <td>{{ $num ++ }}</td>
                                <td>{{ $item['user_name'] }}</td>
                                <td>
                                    <table>
                                        @foreach ($item['kraje'] as $kraj)
                                            <tr>
                                                <td>{{ $kraj['country_name'] }}</td><td>{{ $kraj['language']}}</td><td><img src="http://www.geognos.com/api/en/countries/flag/{{$kraj['country_code']}}.png" width="18" height="12"></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{ $countries->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

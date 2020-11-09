@extends('layouts.apphome')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3>Kraje odwiedzone</h3></div>
            <div class="card-body">
                <div style="margin-top:20px;" class="table-responsiv">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                                <th>Kraj</th>
                                <th>Język</th>
                                <th>Flaga</th>
                                <th>Ile osób odwiedziło kraj</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tablica as $index => $item)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{ $item['country_name']}}</td>
                                    <td>{{ $item['language'] }}</td>
                                    <td><img src="http://www.geognos.com/api/en/countries/flag/{{$item['country_code']}}.png" width="18" height="12"></td>
                                    <td>
                                        @php
                                            $test = sizeOf($item['usersi'])
                                        @endphp
                                            {{$test}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{ $tablica->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    $("#btnExport").click(function (e) {
        window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
        e.preventDefault();
    });

});
</script>

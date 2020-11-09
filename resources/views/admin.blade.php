@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3>Kraje do akceptacji</h3></div>
            <div class="card-body">
                <div class="table-responsiv">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kraj</th>
                                <th>Język</th>
                                <th>Flaga</th>
                                <th>Users</th>
                                <th>Akcept</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($tablica as $index => $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{ $item['country_name']}}</td>
                                    <td>{{ $item['language'] }}</td>
                                    <td><img src="http://www.geognos.com/api/en/countries/flag/{{$item['country_code']}}.png" width="18" height="12"></td>
                                    <td>
                                        <ul>
                                            @foreach ($item['usersi'] as $key => $dwa)
                                            <li>{{$dwa['user']}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <form  action="/admin/akcept" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            @foreach ($item['usersi'] as $trzy)
                                                <input type="hidden" name="checkid[]" value="{{$trzy['checkid']}}">
                                            @endforeach
                                            <button type="submit" class="btn-success">akcept</button>
                                        </form>
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

{{-- <form  action="/desktoptwo/{{$post->id}}/update" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @foreach ($points as $item)
        <div class="form-group row">
            <input type="hidden" name="point_id[]" value="{{$item->id}}">
            <label for="li_href" class="col-sm-1 col-form-label">li href</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="li_href" name="li_href[]" value="{{ old('li_href', $item->li_href) }}">
            </div>
            <label for="li_datatext" class="col-sm-1 col-form-label">li data-text</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="li_datatext" name="li_datatext[]" value="{{ old('li_datatext', $item->li_datatext) }}">
            </div>
            <label for="li_title" class="col-sm-1 col-form-label">li opis</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="li_title" name="li_title[]" value="{{ old('li_title', $item->li_title) }}">
            </div>
        </div>
    @endforeach
    </form>
    --}}

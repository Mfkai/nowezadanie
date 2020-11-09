@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3>Mój Profil</h3></div>
            <div class="card-body">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                       Zalogowany Użytkownik
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Kraj odwiedzony</li>
                      <li class="list-group-item">Drugi kraj odwiedzony</li>
                      <li class="list-group-item">Trzeci itd..</li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

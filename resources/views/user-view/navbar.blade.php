<nav class="navbar fixed">

    <div class="col-md-10">
        <div class="row">
            <a class="btn btn-light btn-md button-navigation-one" role="button" href="{{ url('/') }}" aria-passed="true">
                {{ config('app.name', 'MonikaTestuje') }}
            </a>
            {{-- <a href="{{ url('/') }}" class="btn btn-light btn-md button-navigation-one" role="button" aria-passed="true">{{__('HOME / Lista') }}</a>
            <a href="{{ url('/post/create') }}" class="btn btn-light btn-md button-navigation-one" role="button" aria-passed="true">{{__('Tworzenie artykułu') }}</a>
            <a href="{{ url('/posts') }}" class="btn btn-light btn-md button-navigation-one" role="button" aria-pressed="true">{{__('Publikacja') }}</a>
            <a href="{{ url('/updateposts') }}" class="btn btn-light btn-md button-navigation-one" role="button" aria-pressed="true">{{__('Aktualizacja') }}</a> --}}
        </div>
    </div>

    <div class="col-md-2 dropdown">
        <button class="btn login btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>

<style>
.button-navigation-one {
   margin-right: 10px;
}
.dropdown-menu {
    margin-top:10px;
    background-color:#8498B6;
}
.dropdown-item {
    background-color: #8498B6;
}
.dropdown-menu :hover {
    background-color: #8498B6;
    font-weight: bold;
}
</style>

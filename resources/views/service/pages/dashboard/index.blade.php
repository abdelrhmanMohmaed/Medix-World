@include('service.layout.master')

@section('content')
    @if (!Auth::guard('service_provider')->user())
        <br>
        <a href="{{ route('services.login') }}">login</a>
        <br>
        <a href="{{ route('services.register') }}">regster</a>
    @else
        <br>

        <a href="{{ route('services.profile.index') }}">profile</a>
        <br>
        <a href="{{ route('services.logout') }}">logout</a>
    @endif
@endsection

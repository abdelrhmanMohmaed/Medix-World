@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <p style="padding: 1px">{{ $error }}</p>
        @endforeach
    </div>
@endif

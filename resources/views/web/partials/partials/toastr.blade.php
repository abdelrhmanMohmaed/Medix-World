<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
        {{ Session::forget('success') }};
    @endif
</script>

<script>
    @if (Session::has('wrong'))
        // toastr.options = {
        //     "closeButton": true,
        //     "progressBar": true
        // }
        toastr.error("{{ session('wrong') }}");
        {{ Session::forget('wrong') }};
    @endif
</script>

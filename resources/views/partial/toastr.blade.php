@if(session('error'))
<script>
    $(document).ready(function() {
        toastr.error("Error", "{{Session::get("error")}}", {
            progressBar: true
        });
    });
</script>
@endif

@if(session('success'))
<script>
    $(document).ready(function() {
        toastr.success("{{Session::get("success")}}", {
            progressBar: true
        });
    });
</script>
@endif

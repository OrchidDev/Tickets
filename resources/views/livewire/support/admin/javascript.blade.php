<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- Font Awesome Icons -->
<script src="{{asset('js/light.js')}}"></script>
<!-- Alert ToastrJS -->
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    window.addEventListener('toastr:success', event => {
        toastr.success(event.detail.message);
    })
    window.addEventListener('toastr:warning', event => {
        toastr.warning(event.detail.message);
    })
    window.addEventListener('toastr:info', event => {
        toastr.info(event.detail.message);
    })
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-top-left",
    };
</script>
@yield('script')


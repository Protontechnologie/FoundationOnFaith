<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')

<script>
    @if(Session::has('message'))
    toastr.options =
    {
    	"closeButton" : true,
    	"progressBar" : true,
    	"debug": false,
    	"positionClass": "toast-bottom-right",
    }
    		toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
    	"closeButton" : true,
    	"progressBar" : true,
    	"debug": false,
    	"positionClass": "toast-bottom-right",
    }
    		toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
    	"closeButton" : true,
    	"progressBar" : true,
    	"debug": false,
    	"positionClass": "toast-bottom-right",
    }
    		toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
    	"closeButton" : true,
    	"progressBar" : true,
    	"debug": false,
    	"positionClass": "toast-bottom-right",
    }
    		toastr.warning("{{ session('warning') }}");
    @endif
</script>

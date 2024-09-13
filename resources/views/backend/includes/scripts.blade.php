	<!-- JQUERY JS -->
	<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

	<!-- BOOTSTRAP JS -->
	<script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- SIDE-MENU JS-->
	<script src="{{asset('backend/assets/plugins/sidemenu/sidemenu.js')}}"></script>

	<!-- APEXCHART JS -->
	<script src="{{asset('backend/assets/js/apexcharts.js')}}"></script>

	<!-- INTERNAL SELECT2 JS -->
	<script src="{{asset('backend/assets/plugins/select2/select2.full.min.js')}}"></script>

	<!-- CHART-CIRCLE JS-->
	<script src="{{asset('backend/assets/js/circle-progress.min.js')}}"></script>

	<!-- INTERNAL DATA-TABLES JS-->
	<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

	<!-- INDEX JS -->
	<script src="{{asset('backend/assets/js/index1.js')}}"></script>

	<!-- REPLY JS-->
	<script src="{{asset('backend/assets/js/reply.js')}}"></script>

	<!-- PERFECT SCROLLBAR JS-->
	<script src="{{asset('backend/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/p-scroll/pscroll.js')}}"></script>

    <!-- STICKY JS -->
    <script src="{{asset('backend/assets/js/sticky.js')}}"></script>

    <!-- COLOR THEME JS -->
    <script src="{{asset('backend/assets/js/themeColors.js')}}"></script>

	<!-- CUSTOM JS -->
	<script src="{{asset('backend/assets/js/custom.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/general.js') }}"></script>

	<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (Session::has('success_message'))
<script>
    toastr.options ={
        "closeButton":true,
        "progressBar":true,
    }
    toastr.success("{{Session::get('success_message')}}");
</script>

@elseif (Session::has('error_message'))
<script>
    toastr.options ={
        "closeButton":true,
        "progressBar":true,
    }
    toastr.error("{{Session::get('error_message')}}");
</script>
@endif

	
	{{-- Preview Image while upload --}}
<script>
    $('.custom-file-input').on('change', function() {
        var file = $(this).get(0).files[0];
        var myThis = $(this);
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {

                myThis.closest('.image').find('.previewImage').attr("src", reader.result);


                // $(".previewImage").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    })
</script>
  

	@stack('js')
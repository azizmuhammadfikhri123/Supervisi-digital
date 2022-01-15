 <!-- Bootstrap core JavaScript-->
 <script src={{asset("vendor/jquery/jquery.min.js")}}></script>
 <script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

 <!-- Core plugin JavaScript-->
 <script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>

 <!-- Custom scripts for all pages-->
 <script src={{asset("js/sb-admin-2.min.js")}}></script>

 <!-- Page level plugins -->
 <script src={{asset("vendor/chart.js/Chart.min.js")}}></script>

 <!-- Page level custom scripts -->
 <script src={{asset("js/demo/chart-area-demo.js")}}></script>
 <script src={{asset("js/demo/chart-pie-demo.js")}}></script>

 <script src={{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}></script>

<script src={{ asset('summernote/dist/summernote.js') }}></script>
<script src={{ asset('summernote-image-attributes-master/summernote-image-attributes.js') }}></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 400,
        focus: true
    });
</script>

 @yield('js')

<script src="{{asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{asset('backend/dist/js/app-style-switcher.js')}}"></script>
<script src="{{asset('backend/dist/js/feather.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('backend/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('backend/dist/js/custom.min.js')}}"></script>
<!--This page JavaScript -->
<script src="{{asset('backend/assets/extra-libs/c3/d3.min.js')}}"></script>
<script src="{{asset('backend/assets/extra-libs/c3/c3.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('backend/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('backend/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>




<script src="{{asset('backend/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>


<script>
    $('.setData').click(function() {
      var id = $(this).data('id');      
      var name = $(this).data('name'); 
      var icon = $(this).data('icon'); 
      
      $('#category_id').val(id);  
      $('#name').val(name);  


      $('#edit_img').attr('src',icon);


    } );
  </script>
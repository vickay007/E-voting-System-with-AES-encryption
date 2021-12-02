<script src="{{ asset('/assets/js/vendors.js') }}"></script>

<!-- custom app -->
<script src="{{ asset('/assets/js/app.js') }}"></script>

<!-- <script src="{{ asset('/assets/js/jquery-3.4.1.slim.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript" src="{{ asset('/DataTables/datatables.min.js') }}"></script>

<script src="{{ asset('/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
  jQuery(document).ready(function(){
    jQuery(".myselect").chosen({
      disable_search_threshold: 10,
      no_results_text: "Oops, nothing found!",
      width: "100%"
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change', '.state', function(){
      // console.log("changed successfully");

      var state_id = $(this).val();
       // console.log(state_id);

      var div = $(this).parent().parent();

      var op = " ";

      $.ajax({
        type:'get',
        url:'{!! URL::to('findLocalName') !!}',
        data:{'id':state_id},
        success:function(data){
          // console.log('success');
          console.log(data);
          // console.log(data.length);
          op+='<option value="0" selected disabled>Choose Local Government</option>';
          for(var i=0; i<data.length; i++){
            op+='<option value="'+data[i].local_name+'">'+data[i].local_name+'</option>';
          }

          div.find('.local').html(" ");
          div.find('.local').append(op)
        },
        error:function(){

        }
      });

    });
  });
</script>

<script>
   $(document).ready( function () {
    $('#myTable').DataTable();
   } );
</script>

 <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
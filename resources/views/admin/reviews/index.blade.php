@extends('admin.layouts.master')

@section('title', 'Reviews')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 @if (Session::has('success'))
 <div class="alert alert-success">{{ Session::get('success') }}</div>
 @endif
 @if (Session::has('danger'))
 <div class="alert alert-danger">{{ Session::get('danger') }}</div>
 @endif
      
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reviews</h1>
          </div>
         
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Rating</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Desc</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
@section('addonStyle')
<!-- datatable -->
  <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" >
  <link rel="stylesheet" href="{{asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" >
  <!-- datatable -->
@stop
@section('addonScripts')
<!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{asset('/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script type="text/javascript">

  $(document).ready(function(){

    // DataTable

    $('#example1').DataTable({

       processing: true,
       serverSide: true,
       "lengthChange": false,
       "order": [[ 0, "desc" ]],
       paging: true,
       "pageLength": 20,
       dom: 'Bfrtip',
       buttons: [],
       ajax: "{{route('all-reviews-ajax')}}",
       columns: [
        { data: function(data){
            return data.id;
          }, name:'index' },
          { data: function(data){
            var rating =  data.overall;
            var html = '';
            for(i=1;i<6;i++){
              var cls =(rating>=i)?'fas':'far';
              html +='<i class="'+cls+' fa-star"></i>';
            }
            return html;
          }, name:'overall' },
          { data: function(data){
            return data.from_user;
          }, name:'from' },
          { data:  function(data){
            return data.to_user;
          }, name:'to'},
          { data: 'exp',name:'exp'},
          { data: function(data){
            var linkedit =  '<a href="{{route("reviews-edit","")}}/'+data.id+'" class="btn btn-success btn-flat"><i class="fas fa-edit"></i></a>';
            var linkupdate =  '<a href="{{route("reviews-delete","")}}/'+data.id+'" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></a>';
          return linkedit+linkupdate;
          },
          searchable: false,
          orderable:false,
          name:'actions'
          },

       ]

    });

  });

</script>
@stop

@extends('admin.layouts.master')

@section('title', __('crud.types.title'))

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
            <h1>{{__('crud.types.title')}}</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
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
                @can('create_brands')
                <a href="{{route('types-create')}}" class="btn btn-primary">Create {{__('crud.types.title_singular')}}</a>
                @endcan
      
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="empTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    {{-- <th>#</th> --}}
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- @php $i=0; @endphp
                  @foreach($brands as $brand)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$brand->name}}</td>
                      <td>
                      <div class="btn-group">
                        @can('update_brands')

                          <a href="{{route('brands-edit',$brand->id)}}"  class="btn btn-success btn-flat" >
                            <i class="fas fa-edit"></i>
                          </a>
                        @endcan
                        @can('delete_brands')
                          <a href="{{route('brands-delete',$brand->id)}}"  class="btn btn-danger btn-flat" onclick="return confirm('Are you realy want to delete this')">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        @endcan
                      </div>
                      </td>
                    </tr>
                    @endforeach --}}
                  </tbody>
                  <tfoot>
                  <tr>
                    {{-- <th>#</th> --}}
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
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
<script>
  $(function () {
      // DataTable

    $('#empTable').DataTable({

      processing: true,
      "order": [[0, "desc" ]],
      serverSide: true,
      "lengthChange": false,
      paging: true,
      "pageLength": 20,
      dom: 'Bfrtip',
      buttons: [],
      ajax: "{{route('all-types-ajax')}}",
      columns: [
        { data: 'name', name:'name' },
        { data: function(data){
          if(data.status==1){
            var html  ='Published';
          }else{
            var html  ='Drafted';
          }
          return html;
        } , name:'status'},
        { data: function(data){
          var status ='';
          var linkedit ='';
          var linkupdate ='';
          @can('status_change_brands')
            if(data.status == 1){
               status =  '<a href="{{route("types-change-status","")}}/'+data.id+'" class="btn btn-danger btn-flat">Draft</a>';
            }else{
               status = '<a href="{{route("types-change-status","")}}/'+data.id+'" class="btn btn-info btn-flat">Publish</a>';
            }
          @endcan
          @can('update_brands')
           linkedit =  '<a href="{{route("types-edit","")}}/'+data.id+'" class="btn btn-success btn-flat"><i class="fas fa-edit"></i></a>';
          @endcan
          @can('delete_brands')
           linkupdate =  '<a href="{{route("types-delete","")}}/'+data.id+'" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></a>';
          @endcan
        return status+linkedit+linkupdate;
        },
        searchable: false,
        orderable:false,
        name:'actions'
        },
      ]
    });
  });
  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
</script>
@stop

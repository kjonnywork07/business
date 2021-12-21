@extends('admin.layouts.master')

@section('title', __('crud.customers.title'))

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
            <h1>{{ __('crud.customers.title')}}</h1>
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
                @can('create_customers')
                <a href="{{route('customers-create')}}" class="btn btn-primary">Create {{ __('crud.customers.title_singular')}}</a>
                @endcan
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="empTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    {{-- <th>#</th> --}}
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    {{-- <th>Insta ID</th>
                    <th>Gender</th>
                    <th>DOB</th> --}}
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   {{-- @php $i=0; @endphp
                  @foreach($users as $user)
                    <tr>
                      <td>{{++$i}}</td> 
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->insta_id}}</td>
                      <td>{{($user->gender==1)?'Male':'Female'}}</td>
                      <td>{{$user->birthday}}</td>
                      <td>
                      <div class="btn-group">
                          @can('update_customers')
                          <a href="{{route('customers-edit',$user->id)}}"  class="btn btn-success btn-flat" >
                            <i class="fas fa-edit"></i>
                          </a>
                          @endcan
                          @can('delete_customers')
                          <a href="{{route('customers-delete',$user->id)}}"  class="btn btn-danger btn-flat" onclick="return confirm('Are you realy want to delete this')">
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
                    <th>Email</th>
                    <th>Phone</th>
                    {{-- <th>Insta ID</th>
                    <th>Gender</th>
                    <th>DOB</th> --}}
                    <th>Role</th>
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
    var indexing = 1;
    var table =$('#empTable').DataTable({

      processing: true,

      serverSide: true,
      "lengthChange": false,
      paging: true,
      "pageLength": 20,
      dom: 'Bfrtip',
      order: [[5,'desc']],
      buttons: [],
      ajax: "{{route('all-customer-ajax')}}",
      columns: [

        // { data: null },

        { data: 'name', name:'name' },
        { data: 'email', name:'email'},
        { data: 'phone', name:'phone'},
        // { data: 'insta_id', name:'insta_id'},
        // { data: function(data){
        //   return (data.gender==1)?'Male':'Female';
        // }, name:'gender'},
        // { data: 'birthday', name:'birthday'},
        { data: function(data){
          // data
          // console.log(data.roles);
          var rol = '';
          $.each(data.roles,function(i,item){
            rol += '<span class="right badge badge-info">'+item.name+'</span>';
          })
          return rol;
        },name:'roles',
        searchable: false,
        orderable:false},
        { data: function(data){
          if(data.status==1){
            var html  ='Approved';
          }else{
            var html  ='Disapproved';
          }
          return html;
        },
        searchable: false,
        orderable:true, 
        name:'status'},
        { data: function(data){
          var status ='';
          var linkedit ='';
          var linkupdate ='';
          @can('status_change_customers')
         if(data.status == 1){
           status =  '<a href="{{route("customers-change-status","")}}/'+data.id+'" class="btn btn-danger btn-flat">Disapprove</a>';
          }else{
           status = '<a href="{{route("customers-change-status","")}}/'+data.id+'" class="btn btn-info btn-flat">Approve</a>';
          } 
          @endcan
          @can('update_customers')
           linkedit =  '<a href="{{route("customers-edit","")}}/'+data.id+'" class="btn btn-success btn-flat"><i class="fas fa-edit"></i></a>';
          @endcan
          @can('delete_customers')
           linkupdate =  '<a href="{{route("customers-delete","")}}/'+data.id+'" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></a>';
          @endcan
        return status+linkedit+linkupdate;
        },
        searchable: false,
        orderable:false,
        name:'id'
        },

      ]

    });
    // table.on( 'order.dt search.dt', function () {
    //     table.column(0, {searchable: false,orderable:false,}).nodes().each( function (cell, i) {
    //         console.log(i);
    //         cell.innerHTML = i++;
    //     } );
    // } ).draw();
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

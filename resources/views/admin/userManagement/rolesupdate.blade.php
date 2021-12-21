@extends('admin.layouts.master')

@section('title', 'Update Role')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Role</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('roles-update')}}">
                @csrf
                <input type="hidden" name="id" value="{{ $role->id??''}}" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="role_name" placeholder="Permission Name" value="{{$role->name??''}}" >
                    @error('role_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Permissions</label>
                    <select name="permissions[]" class="select2" multiple="multiple" data-placeholder="Select Permissions" style="width: 100%;">
                      @foreach($permissions as $permission)
                      <option value="{{$permission->id}}" {{(in_array($permission->id,$rolePermissions))?"selected":""}} >{{$permission->name}}</option>
                      @endforeach
                    </select>
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="role_name" placeholder="Role Name"> -->
                    @error('permissions')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
  @section('addonStyle')
  <link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@stop
@section('addonScripts')
<!-- Select2 -->
  <script src="{{asset('/plugins/select2/js/select2.full.min.js')}}"></script>
  <script>
    $(function () {
    $('.select2').select2()
    })
  </script>
@stop

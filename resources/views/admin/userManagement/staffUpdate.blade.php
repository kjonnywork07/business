@extends('admin.layouts.master')

@section('title', 'Update '.__('crud.staff.title_singular'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update {{__('crud.staff.title_singular')}}</h1>
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
                <h3 class="card-title">Update {{__('crud.staff.title_singular')}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('staff-update')}}">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id??''}}" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control"  name="user_name" placeholder="User Name" value="{{!empty(old('user_name'))?old('user_name'):$user->name }}" >
                    @error('user_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{!empty(old('email'))?old('email'):$user->email }}" >
                    @error('email') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control"  name="password" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="text" class="form-control"  name="confirm_password" placeholder="Confirm Password">
                    @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Roles</label>
                    <select name="roles[]" class="select2" multiple="multiple" data-placeholder="Select Roles" style="width: 100%;">
                      @foreach($roles as $role)
                      <option value="{{$role->id}}" {{(in_array($role->id,!empty(old('roles'))?old('roles'):$userRoles))?"selected":""}} >{{$role->name}}</option>
                      @endforeach
                    </select>
                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="role_name" placeholder="Role Name"> -->
                    @error('roles')
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

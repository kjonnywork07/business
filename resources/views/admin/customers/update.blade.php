@extends('admin.layouts.master')

@section('title', 'Update '.__('crud.customers.title_singular'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update {{ __('crud.customers.title_singular')}}</h1>
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
                <h3 class="card-title">Update {{ __('crud.customers.title_singular')}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('customers-update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id??''}}" >
                <div class="card-body">
                  <div class=" ">
                    <img src="{{asset($user->banner_image)}}" onError="this.onerror=null;this.setAttribute('style', 'display:none');" class=" img-rounded" height='200px' id="product-image"  >
                  </div>
                  <div class="form-group">
                    <label for="banner_image">Banner Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="banner_image" id="banner_image">
                      <label class="custom-file-label" for="banner_image">Choose Image</label>
                    </div>
                    @error('banner_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class=" ">
                    <img src="{{asset($user->image)}}" onError="this.onerror=null;this.setAttribute('style', 'display:none');" class="profile-user-img img-fluid img-rounded" height='150px' id="product-image"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control"  name="name" placeholder="Name" value="{{!empty(old('name'))?old('name'):$user->name }}">
                    @error('name')
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
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control"  name="phone" placeholder="Phone" value="{{!empty(old('phone'))?old('phone'):$user->phone }}" >
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categories</label>
                    <select name="categories[]" class="select2 form-control" multiple="multiple" data-placeholder="Select Categories" style="width: 100%;"   >
                      @foreach($categories as $category)
                      <option value="{{$category->id}}" {{in_array($category->id,(!empty(old('categories'))?old('categories'):$crntCats))?'selected':''}} >{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('categories')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Types</label>
                    <select name="types[]" class="select2 form-control" multiple="multiple" data-placeholder="Select Types" style="width: 100%;"   >
                      @foreach($types as $type)
                      <option value="{{$type->id}}" {{in_array($type->id,(!empty(old('types'))?old('types'):$crntTypes))?'selected':''}} >{{$type->name}}</option>
                      @endforeach
                    </select>
                    @error('types')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <input type="text"   name="tags" data-role="tagsinput"  class="form-control"  value="{{!empty(old('tags'))?old('tags'):$tags}}">
                    @error('tags')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="about">About</label>
                    <textarea type="text" class="form-control" name="about" placeholder="About" >{{!empty(old('about'))?old('about'):$user->about }}</textarea>
                    @error('about') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea type="text" class="form-control" name="bio" placeholder="Bio" >{{!empty(old('bio'))?old('bio'):$user->bio }}</textarea>
                    @error('bio') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea type="text" class="form-control" name="meta_title" placeholder="Meta Title" >{{!empty(old('meta_title'))?old('meta_title'):$user->meta_title }}</textarea>
                    @error('meta_title') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="meta_desc">Meta Desc</label>
                    <textarea type="text" class="form-control" name="meta_desc" placeholder="Meta Desc" >{{!empty(old('meta_desc'))?old('meta_desc'):$user->meta_desc }}</textarea>
                    @error('meta_desc') 
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
  <script src="{{asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
  <style type="text/css">

      .bootstrap-tagsinput{

          width: 100%;

      }

      .label-info{

          background-color: #17a2b8;


      }

      .label {

          display: inline-block;

          padding: .25em .4em;

          font-size: 75%;

          font-weight: 700;

          line-height: 1;

          text-align: center;

          white-space: nowrap;

          vertical-align: baseline;

          border-radius: .25rem;

          transition: color .15s ease-in-out,background-color .15s ease-in-out,

          border-color .15s ease-in-out,box-shadow .15s ease-in-out;

      }

</style>

@stop
@section('addonScripts')
<!-- Select2 -->
  <script src="{{asset('/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
 
  <script>
    $(function () {
    $('.select2').select2()
    bsCustomFileInput.init();
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
    })
   
  </script>
@stop

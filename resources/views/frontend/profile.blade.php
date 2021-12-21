@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Main content -->
    <div class="container">
      <div class="row ">
        <div class="col-md-12">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                          @if (!empty($data->image))
                          <img src="{{asset($data->image??'')}}" alt="Profile Image" width="130" class="rounded mb-2 img-thumbnail">
                          @else
                          <img src="{{asset('dist/img/user.png')}}" alt="No Image" width="130" class="rounded mb-2 img-thumbnail">
                          @endif
                          <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0">Mark Williams</h4>
                            <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>New York</p>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Photos</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Followers</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
                        </li>
                    </ul>
                </div>     
            </div>
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-md-12">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="true">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li> --}}
          </ul>
        </div>
        <div class="col-md-12">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
              <div class="row">
                <div class="col-12">
                  <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                    <h5 class="mb-1">All Ratings and Reviews</h5>
                    @forelse ($reviews as $item)
                    <div class="reviews-container">
                      <div class="reviews-members pt-4 pb-4">
                        <div class="media">
                          <a href="#">
                            <img alt="Generic placeholder image" src="http://reviews.iamnotworking.online/profile-images/CfLnarUlQjwwPjzYWCvspI0VbeQZBOF4Fnr5zGrE.png" class="mr-3 rounded-pill">
      
                          </a>
                          <div class="media-body">
                            <div class="reviews-members-header">
      
                              <span class="star-rating float-right mr-2">
                                <b>Overall:</b>
                                <span class="badge badge-info">
                                  3.80  <i class="fas fa-star-half-alt" style="color: white;"></i>                             
                                </span>
                              </span>
                              <span class="star-rating float-right mr-2">
                                <b>field5:</b>
                                <span class="badge badge-info">
                                  3.80  <i class="fas fa-star-half-alt" style="color: white;"></i>                             
                                </span>
                              </span>
                              <span class="star-rating float-right mr-2">
                                <b>field4:</b>
                                <span class="badge badge-info">
                                  3.80  <i class="fas fa-star-half-alt" style="color: white;"></i>                             
                                </span>
                              </span>
                              <span class="star-rating float-right mr-2">
                                <b>field3:</b>
                                <span class="badge badge-info">
                                  3.80  <i class="fas fa-star-half-alt" style="color: white;"></i>                             
                                </span>
                              </span>
                              <span class="star-rating float-right mr-2">
                                <b>field2:</b>
                                <span class="badge badge-info">
                                  3.80  <i class="fas fa-star-half-alt" style="color: white;"></i>                             
                                </span>
                              </span>
                              <span class="star-rating float-right mr-2">
                                <b>field1:</b>
                                <span class="badge badge-info">
                                  3.80  <i class="fas fa-star-half-alt" style="color: white;"></i>                             
                                </span>
                              </span>
      
                              <h6 class="mb-1"><a class="text-black" href="#">{{$item->user->name}}</a></h6>
                              <p class="text-gray">{{date('d M, y', strtotime($item->created_at))}}</p>
                            </div>
                            <div class="reviews-members-body">
                              <p>{{$item->exp}}</p>
                            </div>
      
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                        
                    @empty
                        <h1>No Data Found</h1>
                    @endforelse
                    
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-12">
                  <form method="POST" action="{{route('add-review',$data->name)}}"  id="reviews-form">
                                                        
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{base64_encode($data->id)}}" > --}}
                    <div class="form-group " >
                      <label>Skills</label>
                      <div class="input-rating">
                        <input type="hidden" name="skills" >
                          <i class="far fa-star rating" data-rating="1"></i>
                          <i class="far fa-star rating" data-rating="2"></i>
                          <i class="far fa-star rating" data-rating="3"></i>
                          <i class="far fa-star rating" data-rating="4"></i>
                          <i class="far fa-star rating" data-rating="5"></i>
                      </div>
                      @error('skills')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group" id="reviews-form-focus">
                      <label>Behavior</label>
                      <div class="input-rating">
                        <input type="hidden" name="behavior" >
                          <i class="far fa-star rating" data-rating="1"></i>
                          <i class="far fa-star rating" data-rating="2"></i>
                          <i class="far fa-star rating" data-rating="3"></i>
                          <i class="far fa-star rating" data-rating="4"></i>
                          <i class="far fa-star rating" data-rating="5"></i>
                      </div>
                      @error('behavior')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Collaboration and Teamwork</label>
                      <div class="input-rating">
                        <input type="hidden" name="collaboration_and_teamwork" >
                          <i class="far fa-star rating" data-rating="1"></i>
                          <i class="far fa-star rating" data-rating="2"></i>
                          <i class="far fa-star rating" data-rating="3"></i>
                          <i class="far fa-star rating" data-rating="4"></i>
                          <i class="far fa-star rating" data-rating="5"></i>
                      </div>
                      @error('collaboration_and_teamwork')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Attendance, punctuality and reliability</label>
                      <div class="input-rating">
                        <input type="hidden" name="punctuality" >
                          <i class="far fa-star rating" data-rating="1"></i>
                          <i class="far fa-star rating" data-rating="2"></i>
                          <i class="far fa-star rating" data-rating="3"></i>
                          <i class="far fa-star rating" data-rating="4"></i>
                          <i class="far fa-star rating" data-rating="5"></i>
                      </div>
                      @error('punctuality')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>The ability to accomplish goals and meet deadlines.</label>
                      <div class="input-rating">
                        <input type="hidden" name="ability" >
                          <i class="far fa-star rating" data-rating="1"></i>
                          <i class="far fa-star rating" data-rating="2"></i>
                          <i class="far fa-star rating" data-rating="3"></i>
                          <i class="far fa-star rating" data-rating="4"></i>
                          <i class="far fa-star rating" data-rating="5"></i>
                      </div>
                      @error('ability')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label>Your Comment</label>
                        <textarea class="form-control" name="commnet"></textarea>
                        @error('commnet')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit"> Submit Comment </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action="{{route('update-profile',$data->name)}}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $data->id??''}}" >
                      <div class="card-body">
                        <div class=" ">
                          <img src="{{asset($data->banner_image)}}" onError="this.onerror=null;this.setAttribute('style', 'display:none');" class=" img-rounded" height='200px' id="product-image"  >
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
                          <img src="{{asset($data->image)}}" onError="this.onerror=null;this.setAttribute('style', 'display:none');" class="profile-user-img img-fluid img-rounded" height='150px' id="product-image"  >
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
                          <input type="text" class="form-control"  name="name" placeholder="Name" value="{{!empty(old('name'))?old('name'):$data->name }}">
                          @error('name')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Email" value="{{!empty(old('email'))?old('email'):$data->email }}" >
                          @error('email') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone</label>
                          <input type="text" class="form-control"  name="phone" placeholder="Phone" value="{{!empty(old('phone'))?old('phone'):$data->phone }}" >
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
                          <textarea type="text" class="form-control" name="about" placeholder="About" >{{!empty(old('about'))?old('about'):$data->about }}</textarea>
                          @error('about') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="bio">Bio</label>
                          <textarea type="text" class="form-control" name="bio" placeholder="Bio" >{{!empty(old('bio'))?old('bio'):$data->bio }}</textarea>
                          @error('bio') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="meta_title">Meta Title</label>
                          <textarea type="text" class="form-control" name="meta_title" placeholder="Meta Title" >{{!empty(old('meta_title'))?old('meta_title'):$data->meta_title }}</textarea>
                          @error('meta_title') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="meta_desc">Meta Desc</label>
                          <textarea type="text" class="form-control" name="meta_desc" placeholder="Meta Desc" >{{!empty(old('meta_desc'))?old('meta_desc'):$data->meta_desc }}</textarea>
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
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div> --}}
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.content -->
  @stop

@section('addonScripts')
  <script src="{{asset('/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js" integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
 
 <script>
@if (Session::has('success'))
  // alert('{{ Session::get('success') }}');
      $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 7000
        });
          Toast.fire({
            icon: 'success',
            title: '{{ Session::get('success') }}'
          })
      });
  @endif

    $(function() {
      $('.lazy').lazy({
        effect: "fadeIn",
        effectTime: 2000,
        threshold: 0
      });
  });

  $('.rating').on('click',function(e){
  var ctrelement = $(this);
  var rating = ctrelement.data('rating');

  ctrelement.parent('div.input-rating').children('input').val(rating);
  ctrelement.parent('div.input-rating').children('.rating').each(function(i,item){

    if(i<parseInt(rating)){
    // console.log(i);
        $(item).removeClass('far');
        $(item).addClass('fas');
    }else{
        $(item).addClass('far');
        $(item).removeClass('fas');
    }
  });
});
    $(function () {
    $('.select2').select2()
    bsCustomFileInput.init();
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
    })
   
  </script>
@stop
@section('addonStyle')
  <link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
  
<style>
  .profile-head {
    transform: translateY(12rem)
}

.cover {
  @if(!empty($data->banner_image))
  background-image: url('{{asset($data->banner_image??'')}}');
  @else
  background:black;
  @endif
    background-size: cover;
    background-repeat: no-repeat;
    height: 300px;
}

body {
    /* background: #654ea3; */
    /* background: linear-gradient(to right, #e96443, #904e95); */
    min-height: 100vh;
    overflow-x: hidden
}
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

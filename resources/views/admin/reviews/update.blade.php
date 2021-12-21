@extends('admin.layouts.master')

@section('title', 'Update Rating')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Rating</h1>
          </div>
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
                <h3 class="card-title">Update Rating</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('reviews-update')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" value="{{ $review->id??''}}"  >
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>Skills</label>
                    <div class="input-rating">
                      <input type="hidden" name="skills" value="{{$review->field1}}">
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
                  <div class="form-group">
                    <label>Behavior</label>
                    <div class="input-rating">
                      <input type="hidden" name="behavior" value="{{$review->field2}}">
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
                      <input type="hidden" name="collaboration_and_teamwork" value="{{$review->field3}}">
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
                      <input type="hidden" name="punctuality" value="{{$review->field4}}">
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
                      <input type="hidden" name="ability" value="{{$review->field5}}" >
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
                    <label for="exampleInputEmail1">Desc</label>
                    <textarea class="form-control" name="desc" placeholder="Desc" >{{$review->exp}}</textarea>
                    @error('desc') 
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
<style>
    /* rating ++++++++++++++ */
    div.input-rating .rating {
    font-size: 30px;
    color: #007bff;
}
</style>
  @stop
@section('addonScripts')
<!-- Select2 -->
  <script src="{{asset('/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <script>
    $(function () {
    $('.select2').select2()
    })
    $(function () {
      bsCustomFileInput.init();
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
$(document).ready(function(){
  $('div.input-rating').each(function(i,item){
    var rating = $(item).children('input').val();
    $(item).children('.rating').each(function(sI,sItem){
      if(sI<parseInt(rating)){
          $(sItem).removeClass('far');
          $(sItem).addClass('fas');
      }else{
          $(sItem).addClass('far');
          $(sItem).removeClass('fas');
      }
    });
  });
});
  </script>
@stop

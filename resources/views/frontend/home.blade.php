@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Main content -->
    <section class="content">
        
        <div class="container">
          <div class="row pt-5 pb-5">
            <div class="col-md-12 text-center">
              <h2>Business</h2>
            </div>
          </div>
          
          <div class="row">
              @if(isset($data))
                @forelse ($data as $item)
                
                  <div class="col-md-3 mt-3">
                    <div class="card profile-card-5">
                      <div class="card-img-block">
                          <img class="card-img-top" src="{{asset(empty($item->image)?'dist/img/user.png':$item->image)}}" alt="Card image cap">
                      </div>
                        <div class="card-body pt-0">
                          <h5 class="card-title">{{$item->name}}</h5>
                          <p class="card-text">{{substr($item->about,0,100)}}{{strlen($item->about)>100?'...':''}}</p>
                          <ul class="list-inline small">

                            @for($i=1;$i<6;$i++)
                              @if ($i>$item->review_avg && ceil($item->review_avg)==$i && $item->review_avg!=$i)
                                <i class="fas fa-star-half-alt text-success"></i>
                              @else
                                <i class="{{!empty($item->review_avg) && $item->review_avg>=$i?'fas':'far'}} fa-star text-success"></i>
                              @endif
                            @endfor
                            {{-- <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                            <li class="list-inline-item m-0"><i class="far fa-star text-success"></i></li> --}}
                          </ul>
                        <a href="{{route('profile',['account'=>$item->name??''])}}" class="btn btn-link pl-0">View Profile</a>

                        </div>
                    </div>
                    {{-- <p class="mt-3 w-100 float-left text-center"><strong>Card with Floting Picture</strong></p> --}}
                  </div>
                @empty
                  <h1>No data Found</h1>
                @endforelse
              @endif
            {{-- </div> --}}
          </div>
          <div class="row mt-3">
            <div class="col-md-12 text-center">
              <a href="{{route('home')}}" class="btn btn-link">View All</a>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  @stop

@section('addonScripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js" integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(function() {
      $('.lazy').lazy({
        effect: "fadeIn",
        effectTime: 2000,
        threshold: 0
      });
  });
  </script>
@stop
@section('addonStyle')
<style>
/*Profile Card 5*/
.profile-card-5{
    margin-top:20px;
}
.profile-card-5 .btn{
    border-radius:2px;
    text-transform:uppercase;
    font-size:12px;
    padding:7px 20px;
}
.profile-card-5 .card-img-block {
    width: 91%;
    margin: 0 auto;
    position: relative;
    top: -20px;
    
}
.profile-card-5 .card-img-block img{
    border-radius:5px;
    box-shadow:0 0 10px rgba(0,0,0,0.63);
}
.profile-card-5 h5{
    color:#4E5E30;
    font-weight:600;
}
.profile-card-5 p{
    font-size:14px;
    font-weight:300;
}
.profile-card-5 .btn-primary{
    background-color:#4E5E30;
    border-color:#4E5E30;
}
/* i.fas.fa-star{
  color: #28a745;
} */
</style>
@stop

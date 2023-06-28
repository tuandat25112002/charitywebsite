@extends('user/master')
@section('content')
<style type="text/css">
    .b-0 {
    bottom: 0;
}
.img-fluid{
    height: 700px !important;
}
.bg-shadow {
    background: rgba(76, 76, 76, 0);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179, 171, 171, 0)), color-stop(49%, rgba(48, 48, 48, 0.37)), color-stop(100%, rgba(19, 19, 19, 0.8)));
    background: linear-gradient(to bottom, rgba(179, 171, 171, 0) 0%, rgba(48, 48, 48, 0.71) 49%, rgba(19, 19, 19, 0.8) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}
.top-indicator {
    right: 0;
    top: 1rem;
    bottom: inherit;
    left: inherit;
    margin-right: 1rem;
}
.overflow {
    position: relative;
    overflow: hidden;
}
.card-img-top {
    width: 100%;
    height: 300px;
    }
.zoom img {
    transition: all 0.2s linear;
}
.zoom:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
    <div class="container mt-3">
           <div class="row col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active"><a href="{{URL::to('all-news')}}">Tin tức</a></li>
            </ol>
          </div>

      </div>
      <div class="container">
        <section class="row">
                <!--Start slider news-->
                <div class="col-12 col-md-12 pb-0 pb-md-3 pt-2 pr-md-1">
                    <div id="featured" class="carousel slide carousel" data-ride="carousel">
                        <!--carousel inner-->
                        <div class="carousel-inner">
                            <!--Item slider-->
                            @foreach($news as $key=> $value)
                            <div class="carousel-item <?php echo $key==0?"active":""?>">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="{{URL::to("news-details/".$value->id)}}">
                                                <img class="img-fluid w-100"
                                                     src="{{$value->hinhanh}}"
                                                     alt="Bootstrap news template">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="{{URL::to("news-details/".$value->id)}}">
                                                <h2 class="h3 post-title text-white my-1">{{$value->tieude}}</h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">

                                                <span class="news-date">{{$value->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--end carousel inner-->
                    </div>

                    <!--navigation-->
                    <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--End slider news-->

            </section>
            </div>
            <!--END SECTION-->
     <div class="container">
    <div class="row">
 @foreach($news as $key=> $value)
    <div class="col-lg-4 mb-4">
    <div class="card">
      <img src="{{$value->hinhanh}}" alt="" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">{{$value->tieude}}</h5>
        <p class="card-text">{{$value->tomtat}}</p>
       <a href="{{URL::to("news-details/".$value->id)}}" class="btn btn-outline-primary btn-sm">Read More</a>
        <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
        <span class="float-right">Lượt xem: {{$value->luotxem}} <i class="fas fa-eye"></i></span>
      </div>
     </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

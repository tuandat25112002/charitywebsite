@extends('user/master')
@section('content')
<section class="ftco-section pt-0 pb-0">
      <div class="w-100">
        <div class="ml-0 mr-0 row">
          <div class="col-md-12 pr-0 pl-0">
            <div class="slider-hero">
              <div class="featured-carousel carousel-slider owl-carousel">
                @foreach($sliders as $slider)
                <div class="item">
                  <div class="work">
                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url(<?php echo $slider->image?>);">
                      <div class="text text-center">
                        <div class="text-light s-20 text-upscase"><b>{{$slider->title}}</b></div>
                        <h2><?php echo $slider->name?></h2>
                        <div class="text-light s-20">
                          <?php echo $slider->description?>
                        </div>
                        <div class="mt-2">
                        <button class="btn btn-outline-light">Xem thêm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               @endforeach
              </div>

              <div class="my-5 text-center">
                <ul class="thumbnail">
                  <li class="img active"><a href="#"><img src="<?php echo $slider_first->image?>" alt="Image" class="img-fluid"></a></li>
                  @foreach($sliders as $key => $slider)
                  @if($key!=0)
                  <li class="img"><a href="#"><img src="<?php echo $slider->image?>" alt="Image" class="img-fluid"></a></li>
                  @endif
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5"><b>ĐỘI NGŨ CỦA CHÚNG TÔI</b></h2>
          </div>
          <div class="col-md-12">
            <div class="featured-carousel carousel-intro owl-carousel">
              <div class="item">
                <div class="work-wrap d-md-flex">
                  <div class="img order-md-last" style="background-image: url(https://res.cloudinary.com/dcugpagjy/image/upload/v1686664878/avatar/3T-00512_o8ebsl.jpg);"></div>
                  <div class="text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center">
                    <div class="desc w-100">
                      <h2 class="">Duong Tuan Dat</h2>
                      <p class="h4 mb-4">Leader</p>
                      <p class="h5 mb-4">Email: dtat.20it1@vku.udn.vn</p>
                      <p class="h5 mb-4">Số điện thoại: (+84) 946 234 470</p>

                      <p>
                        <a type="button" href="" class="btn btn-outline-dark mb-2 py-3 px-4"><i class="fas fa-phone"></i> Liên hệ</a>
                        <a type="button" href="" class="btn btn-dark mb-2 py-3 px-4"><i class="fas fa-envelope"></i> Gửi lời nhắn</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="work-wrap d-md-flex">
                  <div class="img order-md-last" style="background-image: url(https://res.cloudinary.com/dcugpagjy/image/upload/v1686664822/avatar/330999411_1433269997209672_4660471137688905604_n_q52lak.jpg);"></div>
                  <div class="text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center">
                    <div class="py-md-5">
                      <h2 class="">Pham Dinh Thoan</h2>
                      <p class="h4 mb-4">Co-leader</p>
                      <p class="h5 mb-4">Email: ptdthoan.20it6@vku.udn.vn</p>
                      <p class="h5 mb-4">Số điện thoại: (+84) 946 234 470</p>

                      <p>
                        <button type="button" class="btn btn-outline-dark mb-2 py-3 px-4"><i class="fas fa-phone"></i> Liên hệ</button>
                        <button type="button" class="btn btn-dark mb-2 py-3 px-4"><i class="fas fa-envelope"></i> Gửi lời nhắn</button>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

         <div class="row ml-0 mr-0 mt-5 bg-image-home" style="background-image: url(https://scontent.fsgn2-6.fna.fbcdn.net/v/t39.30808-6/329983428_863347814777537_2529087863572470546_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=e3f864&_nc_ohc=wGAZrnIzFugAX8GJbLU&_nc_ht=scontent.fsgn2-6.fna&oh=00_AfBdVc0LWquhPUGn2-4yKFoBFdZk89QIYk_hQ8_XTLPrIQ&oe=648A8C4C);">
            <div class="bg-opacity">
                <div class="container h-100 p-relative">
                    <div class="header-section mt-auto mb-auto" >
                        <div data-aos="fade-right">CÁC CHIẾN DỊCH, DỰ ÁN <br> CHƯƠNG TRÌNH TỪ THIỆN</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

        <div class="row ml-0 mr-0 mt-5">
          <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5 mt-5" id="1"><b>CHƯƠNG TRÌNH HỖ TRỢ VÙNG CAO, VÙNG KHÓ KHĂN</b></h2>
          </div>
           <div class="row ml-0 mr-0 w-100" data-aos="fade-up" id="row1">
            <div class="owl-carousel caorusel-list-plan " >
                @foreach($projects as $project)
                @if($project->id_category == 1)
                <div class="item">
                  <div class="w-100 mb-5">
                    <div class="card h-100">
                      <a href="{{URL::to("project/".$project->slug."=".$project->id)}}">
                        <div class="img-card text-light">
                            <img src="{{$project->thumbnail}}">
                            <div class="calender-card">
                               <i class="fas fa-calendar-week"></i><?php echo " Ngày ".date("d", $project->date_action)." Tháng ".date("m", $project->date_action)." Năm ".date("Y", $project->date_action)?>
                            </div>
                           {{--  <div class="place-card">
                               <i class="fa-solid fa-location-dot mr-10"></i> Trà Tập, Nam Trà My, Quảng Nam
                            </div> --}}
                        </div>
                        <div class="donation p-2">
                            <div class="w-100 percent-donation">
                                <div class="pl-3 pr-3 pb-3">
                              <div class="float-left text-dark"><b>Quyên góp</b></div>
                              <div class="float-right text-dark"><b>Mục tiêu</b></div>
                            </div>
                            <div class="skills mt-3 mb-1">
                              <div class="skill">
                                <div class="skill-bar">
                                    <?php
                                    if($project->target!=0){
                                        $percent = (($project->donation+$project->fund)/$project->target)*100;
                                    }else{
                                        $percent=100;
                                    }
                                ?>
                                  <div class="skill-per" per="<?php echo $percent?>"></div>
                                </div>
                              </div>
                            </div>
                            <div class="pr-3 pl-3 pt-0">
                              <div class="float-left text-dark"><span><b><?php echo number_format( $project->donation + $project->fund,0)?></b></span> VNĐ</div>
                              <div class="float-right text-dark"><span><b><?php echo number_format( $project->target,0)?></b></span> VNĐ</div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body pb-1">
                          <h6 class="category-title">{{$project->Category->name_category}}</h6>
                          <h4 class="card-title">{{$project->name_project}}</h4>
                            <div class="card-text"><p>{{$project->short_desc}}</p></div>
                        </div>
                        <div class="card-footer">
                          <a href="#" class="btn btn-outline-primary mb-1">Xem thêm</a>
                          @if($project->status==0)
                          <a class="float-right btn btn-donate btn-warning" href="{{URL::to('/donate?id_project='.$project->id)}}"><div class=" "><i class="fas fa-donate"></i> Ủng hộ</div></a>
                          @else
                          <div class="float-right btn text-success pr-0"><i class="fas fa-check-circle"></i> Đã hoàn thành</div>
                          @endif
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
          </div>
            </div>
    <!-- /.row -->
</div>
</div>
<div class="container">
   <div class="row ml-0 mr-0 mt-5">
          <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5 mt-5" id="2"><b>CHƯƠNG TRÌNH THIỆN NGUYỆN</b></h2>
          </div>
           <div class="row ml-0 mr-0 w-100" data-aos="fade-up" id="row1">
            <div class="owl-carousel caorusel-list-plan " >
                @foreach($projects as $project)
                @if($project->id_category == 2)
                <div class="item">
                  <div class="w-100 mb-5">
                    <div class="card h-100">
                      <a href="{{URL::to("project/".$project->slug."=".$project->id)}}">
                        <div class="img-card text-light">
                            <img src="{{$project->thumbnail}}">
                            <div class="calender-card">
                               <i class="fas fa-calendar-week"></i><?php echo " Ngày ".date("d", $project->date_action)." Tháng ".date("m", $project->date_action)." Năm ".date("Y", $project->date_action)?>
                            </div>
                           {{--  <div class="place-card">
                               <i class="fa-solid fa-location-dot mr-10"></i> Trà Tập, Nam Trà My, Quảng Nam
                            </div> --}}
                        </div>
                        <div class="donation p-2">
                            <div class="w-100 percent-donation">
                                <div class="pl-3 pr-3 pb-3">
                              <div class="float-left text-dark"><b>Quyên góp</b></div>
                              <div class="float-right text-dark"><b>Mục tiêu</b></div>
                            </div>
                            <div class="skills mt-3 mb-1">
                              <div class="skill">
                                <div class="skill-bar">
                                    <?php
                                    if($project->target!=0){
                                        $percent = (($project->donation+$project->fund)/$project->target)*100;
                                    }else{
                                        $percent=100;
                                    }
                                ?>
                                  <div class="skill-per" per="<?php echo $percent?>"></div>
                                </div>
                              </div>
                            </div>
                            <div class="pr-3 pl-3 pt-0">
                              <div class="float-left text-dark"><span><b><?php echo number_format( $project->donation + $project->fund,0)?></b></span> VNĐ</div>
                              <div class="float-right text-dark"><span><b><?php echo number_format( $project->target,0)?></b></span> VNĐ</div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body pb-1">
                          <h6 class="category-title">{{$project->Category->name_category}}</h6>
                          <h4 class="card-title">{{$project->name_project}}</h4>
                            <div class="card-text"><p>{{$project->short_desc}}</p></div>
                        </div>
                        <div class="card-footer">
                          <a href="{{URL::to("project/".$project->slug."=".$project->id)}}" class="btn btn-outline-primary mb-1">Xem thêm</a>
                          @if($project->status==0)
                          <a class="float-right btn btn-donate btn-warning" href="{{URL::to('/donate?id_project='.$project->id)}}"><div class=" "><i class="fas fa-donate"></i> Ủng hộ</div></a>
                          @else
                          <div class="float-right btn text-success pr-0"><i class="fas fa-check-circle"></i> Đã hoàn thành</div>
                          @endif
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
          </div>
            </div>
    <!-- /.row -->
</div>
</div>
 <div class="container">
      <div class="row ml-0 mr-0 mt-5">
          <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5 mt-5" id="3"><b>CHƯƠNG TRÌNH SUẤT ĂN MIỄN PHÍ</b></h2>
          </div>
           <div class="row ml-0 mr-0 w-100" data-aos="fade-up" id="row1">
            <div class="owl-carousel caorusel-list-plan " >
            @foreach($projects as $project)
                @if($project->id_category == 3)
                <div class="item">
                  <div class="w-100 mb-5">
                    <div class="card h-100">
                      <a href="{{URL::to("project/".$project->slug."=".$project->id)}}">
                        <div class="img-card text-light">
                            <img src="{{$project->thumbnail}}">
                            <div class="calender-card">
                               <i class="fas fa-calendar-week"></i><?php echo " Ngày ".date("d", $project->date_action)." Tháng ".date("m", $project->date_action)." Năm ".date("Y", $project->date_action)?>
                            </div>
                           {{--  <div class="place-card">
                               <i class="fa-solid fa-location-dot mr-10"></i> Trà Tập, Nam Trà My, Quảng Nam
                            </div> --}}
                        </div>
                        <div class="donation p-2">
                            <div class="w-100 percent-donation">
                                <div class="pl-3 pr-3 pb-3">
                              <div class="float-left text-dark"><b>Quyên góp</b></div>
                              <div class="float-right text-dark"><b>Mục tiêu</b></div>
                            </div>
                            <div class="skills mt-3 mb-1">
                              <div class="skill">
                                <div class="skill-bar">
                                    <?php

                                    if($project->target!=0){
                                        $percent = (($project->donation+$project->fund)/$project->target)*100;
                                    }else{
                                        $percent=100;
                                    }
                                ?>
                                  <div class="skill-per" per="<?php echo $percent?>"></div>
                                </div>
                              </div>
                            </div>
                            <div class="pr-3 pl-3 pt-0">
                              <div class="float-left text-dark"><span><b><?php echo number_format( $project->donation + $project->fund,0)?></b></span> VNĐ</div>
                              <div class="float-right text-dark"><span><b><?php echo number_format( $project->target,0)?></b></span> VNĐ</div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body pb-1">
                          <h6 class="category-title">{{$project->Category->name_category}}</h6>
                          <h4 class="card-title">{{$project->name_project}}</h4>
                            <div class="card-text"><p>{{$project->short_desc}}</p></div>
                        </div>
                        <div class="card-footer">
                          <a href="{{URL::to("project/".$project->slug."=".$project->id)}}" class="btn btn-outline-primary mb-1">Xem thêm</a>
                          @if($project->status==0)
                          <a class="float-right btn btn-donate btn-warning" href="{{URL::to('/donate?id_project='.$project->id)}}"><div class=" "><i class="fas fa-donate"></i> Ủng hộ</div></a>
                          @else
                          <div class="float-right btn text-success pr-0"><i class="fas fa-check-circle"></i> Đã hoàn thành</div>
                          @endif
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                @endif
            @endforeach
          </div>
            </div>
    <!-- /.row -->
      </div>
  </div>
    <div class="container">
      <div class="row ml-0 mr-0 mt-5">
          <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5 mt-5" id="4"><b>HOẠT ĐỘNG TÌNH NGUYỆN</b></h2>
          </div>
           <div class="row ml-0 mr-0 w-100" data-aos="fade-up" id="row1">
            <div class="owl-carousel caorusel-list-plan " >
            @foreach($projects as $project)
                @if($project->id_category == 4)
                <div class="item">
                  <div class="w-100 mb-5">
                    <div class="card h-100">
                      <a href="{{URL::to("project/".$project->slug."=".$project->id)}}">
                        <div class="img-card text-light">
                            <img src="{{$project->thumbnail}}">
                            <div class="calender-card">
                               <i class="fas fa-calendar-week"></i><?php echo " Ngày ".date("d", $project->date_action)." Tháng ".date("m", $project->date_action)." Năm ".date("Y", $project->date_action)?>
                            </div>
                           {{--  <div class="place-card">
                               <i class="fa-solid fa-location-dot mr-10"></i> Trà Tập, Nam Trà My, Quảng Nam
                            </div> --}}
                        </div>
                        <div class="donation p-2">
                            <div class="w-100 percent-donation">
                                <div class="pl-3 pr-3 pb-3">
                              <div class="float-left text-dark"><b>Quyên góp</b></div>
                              <div class="float-right text-dark"><b>Mục tiêu</b></div>
                            </div>
                            <div class="skills mt-3 mb-1">
                              <div class="skill">
                                <div class="skill-bar">
                                    <?php

                                    if($project->target!=0){
                                        $percent = (($project->donation+$project->fund)/$project->target)*100;
                                    }else{
                                        $percent=100;
                                    }
                                ?>
                                  <div class="skill-per" per="<?php echo $percent?>"></div>
                                </div>
                              </div>
                            </div>
                            <div class="pr-3 pl-3 pt-0">
                              <div class="float-left text-dark"><span><b><?php echo number_format( $project->donation + $project->fund,0)?></b></span> VNĐ</div>
                              <div class="float-right text-dark"><span><b><?php echo number_format( $project->target,0)?></b></span> VNĐ</div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body pb-1">
                          <h6 class="category-title">{{$project->Category->name_category}}</h6>
                          <h4 class="card-title">{{$project->name_project}}</h4>
                            <div class="card-text"><p>{{$project->short_desc}}</p></div>
                        </div>
                        <div class="card-footer">
                          <a href="{{URL::to("project/".$project->slug."=".$project->id)}}" class="btn btn-outline-primary mb-1">Xem thêm</a>
                          @if($project->status==0)
                          <a class="float-right btn btn-donate btn-warning" href="{{URL::to('/donate?id_project='.$project->id)}}"><div class=" "><i class="fas fa-donate"></i> Ủng hộ</div></a>
                          @else
                          <div class="float-right btn text-success pr-0"><i class="fas fa-check-circle"></i> Đã hoàn thành</div>
                          @endif
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                @endif
            @endforeach
          </div>
            </div>
    <!-- /.row -->
      </div>
      </div>
       <div class="row ml-0 mr-0 mt-5 bg-image-home" style="background-image: url(https://res.cloudinary.com/dcugpagjy/image/upload/v1686658396/news/hand-in-hand-viet-han-%E2%80%93-%5Bclean-up-son-tra-2021-%E2%80%93-vi-mot-son-tra-xanh%5D-2759.jpg);">
            <div class="bg-opacity">
                <div class="container h-100 p-relative">
                    <div class="header-section mt-auto mb-auto" >
                        <div data-aos="fade-right">TIN TỨC TỪ THIỆN<br>VIỆC TỬ TẾ</div>
                    </div>
                </div>
            </div>
        </div>
         <div class="container">
      <div class="row ml-0 mr-0 mt-5">
          <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5 mt-5"><b>VIỆC TỬ TẾ</b></h2>
          </div>
           <div class="row ml-0 mr-0 w-100" data-aos="fade-up" id="row1">
            <div class="owl-carousel caorusel-list-plan " >
            @foreach($news as $value)

                <div class="item">
                  <div class="w-100 mb-5">
                    <div class="card h-100">
                      <a href="{{URL::to("news-details/".$value->id)}}">
                        <div class="img-card text-light">
                            <img src="{{$value->hinhanh}}">
                        </div>
                        <div class="card-body pb-1">
                          <h6 class="category-title">{{$value->created_at}}</h6>
                          <h4 class="card-text card-title">{{$value->tieude}}</h4>
                            <div class="card-text"><p>{{$value->tomtat}}</p></div>
                        </div>
                        <div class="card-footer">
                          <a href="{{URL::to("news-details/".$value->id)}}" class="btn btn-outline-primary mb-1">Xem thêm</a>

                        </div>
                      </a>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
            </div>
    <!-- /.row -->
      </div>
    </section>
      <script>
      var owl1 = $('.caorusel-list-plan');
       owl1.owlCarousel({
        margin: 10,
        autoplay:true,
        center:false,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1,
            center:true
          },
          768: {
            items: 2,
            // center:true,
          },
          1000: {
            items: 3
          }
        }
      })
    </script>

@endsection

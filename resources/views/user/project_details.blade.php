@extends('user/master')
@section('content')

    <div class="container mt-3">
           <div class="row col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('')}}">Dự án</a></li>
              <li class="breadcrumb-item active">{{$project->name_project}}</li>
            </ol>
          </div>
        <div class="row justify-content-center mb-3" id="donate">
          <div class="col-md-12 col-xl-12">
            <div class="card shadow-0 border rounded-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-5 col-xl-5 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                      <img src="{{$project->thumbnail}}"
                        class="w-100" />
                      <a href="#!">
                        <div class="hover-overlay">
                          <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 col-lg-5 col-xl-4">
                    <h5>{{$project->name_project}}</h5>
                    <div class="d-flex flex-row">
                      <a class="text-primary" href="">{{$project->Category->name_category}}</a>
                    </div>
                    <div class="mt-1 mb-0 text-muted small">
                      <span><i class="fas fa-check-circle text-success"></i> Giấy tờ tổ chức</span>

                    </div>
                    <div class="text-muted small">
                       <span><i class="fas fa-check-circle text-success"></i> Đã khảo sát địa điểm</span>
                    </div>
                    <div class="mb-2 text-muted small">
                       <span><i class="fas fa-check-circle text-success"></i> Xác nhận thông tin người đăng</span>
                    </div>
                    <p class="text-truncate mb-2 mb-md-0">
                      <b>Ngày diễn ra: </b> <?php echo "Ngày ".date("d", $project->date_action)." tháng ".date("m", $project->date_action)." năm ".date("Y", $project->date_action)?>
                    </p>
                    <p class="text-truncate mb-4 mb-md-0">
                      <b>Ủng hộ cho: </b> {{$project->donate_for}}
                    </p>
                  </div>
                  <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                        @if($project->status==0)
                        <h6 class="text-success">Mục tiêu: </h6>
                        <div class="d-flex flex-row align-items-center mb-1">
                          <h4 class="mb-1 me-1"><?php echo number_format( $project->target,0)?></b></span> VNĐ</h4>
                        </div>
                        <h6 class="text-warning">Đã quyên góp được: </h6>
                        <div class="d-flex flex-row align-items-center mb-1">
                          <h4 class="mb-1 me-1"><?php echo number_format( $project->donation + $project->fund,0)?></b></span> VNĐ</h4>
                        </div>
                        <div class="d-flex flex-column mt-4">
                          <a href="{{URL::to('/donate?id_project='.$project->id)}}" class="btn btn-primary s-20" type="button">ỦNG HỘ DỰ ÁN</a>

                        </div>
                        @else
                        <div class="text-center">
                            <div class="icon-complete text-success"><i class="fas fa-check-circle text-success"></i></div>
                            <div class="text-success mt-2 s-20">Đã hoàn thành</div>
                        </div>
                        @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
     <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{$project->thumbnail}}" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h6><a href="#" class="text-web">{{$project->Category->name_category}}</a></h6>
                            <h2>{{$project->name_project}}</h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://res.cloudinary.com/dcugpagjy/image/upload/v1686597652/avatar/avatar_default_lotm7k.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label class="text-web">{{$project->User->name}}</label>
                                    <span><?php echo "Ngày ".date("d", $project->date_action)." tháng ".date("m", $project->date_action)." năm ".date("Y", $project->date_action)?></span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <?php echo $project->description?>
                        </div>
                        @if($project->status==0)
                         <div class="mt-4 mb-4">
                        <div id="contact-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="send">
                                        <a href="#donate" class="px-btn theme"><span>Donate</span> <i class="arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @else
                         <div class="mt-4 mb-4 text-center">
                             <div class="icon-complete text-success"><i class="fas fa-check-circle text-success"></i></div>
                            <div class="text-success mt-1 s-20">Đã hoàn thành</div>
                         </div>
                        @endif
                        <div class="nav tag-cloud">
                            <?php  $categories = Session::get('categories');?>
                            @foreach($categories as $value)
                                @if($project->id_category!=$value->id)
                                <a href="#">{{$value->name_category}}</a>
                                @endif
                            @endforeach
                        </div>


                    </article>
                   {{--  <div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>

                    </div> --}}
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-body" style="background: linear-gradient(135deg, rgba(0,90,135,1) 11%, rgba(0,107,161,1) 32%, rgba(0,124,186,1) 100%);">
                            <div class="media align-items-center">
                                <div>
                                    <img height="80px" width="auto" src="<?php echo Session::get('logo')->content?>" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <h6 class="text-light"><?php echo Session::get('name')->content?></h6>
                                </div>
                            </div>
                            <p class="text-light"><i>"Không có gì khó khăn hơn là đối mặt và vượt qua chính bản thân mình"</i></p>
                            <p class="text-light text-right">Slogan Hand In Hand</p>
                        </div>
                    </div>
                    <!-- End Author -->

                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title ">
                            <h3 class="text-web">Dự án sắp tới</h3>
                        </div>
                        <div class="widget-body">
                            @foreach($projects as $value)
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5 class="text-one-line"><a href="{{URL::to("project/".$value->slug."=".$value->id)}}">{{$value->name_project}}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        Ủng hộ: <span class="name" href="#">
                                            <?php
                                            $donation = $value->fund+$value->donation;
                                            echo number_format($donation ,0)?></b></span> VNĐ
                                            (<?php
                                            if($value->target>0){
                                                $percent = ($donation/$value->target)*100;
                                            }else{
                                                $percent = 100;
                                            }
                                            echo $percent;
                                        ?>%)

                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="{{$value->thumbnail}}" title="" alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Danh mục liên quan</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                 @foreach($categories as $value)
                                @if($project->id_category!=$value->id)
                                <a href="#">#{{$value->name_category}}</a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>

        @if(session('status_donate'))
        <script type="text/javascript">
            Swal.fire(
              'Ủng hộ thành công',
              'Cảm ơn sự đồng hành của bạn cùng với chương trình của chúng tôi!',
              'success'
            );
        </script>
        @endif
@endsection

@extends('user/master')
@section('content')

    <div class="container mt-3">
           <div class="row col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('all-news')}}">Tin tức</a></li>
              <li class="breadcrumb-item active">{{$news->tieude}}</li>
            </ol>
          </div>
     <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{$news->hinhanh}}" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h6><a href="#" class="text-web">Tin tức</a></h6>
                            <h2>{{$news->tieude}}</h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://res.cloudinary.com/dcugpagjy/image/upload/v1686597652/avatar/avatar_default_lotm7k.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label class="text-web">Admin</label>
                                    <span>{{$news->created_at}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <?php echo $news->noidung?>
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
                                <a href="#">#{{$value->name_category}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </div>
@endsection

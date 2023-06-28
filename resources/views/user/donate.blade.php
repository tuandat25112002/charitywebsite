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
  <div class="py-5 text-center">
    <img class="d-block mx-auto" src="{{Session::get('logo')->content}}">
    <h2>Donate</h2>
    <p class="lead">Mọi sự ủng hộ của quý nhà hảo tâm sẽ được update liên tục trong <a href="">báo cáo tài chính</a></p>
  </div>

  <div class="row mb-4">
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">THÔNG TIN ỦNG HỘ</h4>
      <form class="needs-validation" action="{{URL::to('vnpay-payment')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="name">Họ và tên:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{Session::get('user')->name}}">
            <div class="mt-2">
            <input type="checkbox" id="anonymous"> <lable for="anonymous">Nhà hảo tâm ẩn danh
              <input type="hidden" id="checked_anonymous" value="0" name="anonymous"> <lable for="anonymous">
            </lable>
            <input type="hidden" id="id_project" value="{{$project->id}}" name="id_project">
          </div>
        </div>
        </div>
        <div class="mb-3">
          <label for="email">Email (<span class="text-danger">*</span>)</label>
          <input type="email" name="email" class="form-control" required="true" id="email" placeholder="you@example.com" value="{{Session::get('user')->email}}">
          <div class="invalid-feedback text-danger">
            Nhập email đúng định dạng.
          </div>
        </div>
        <div id="donate_component">
        <hr class="mb-4">

        <h4 class="mb-3">Ủng hộ hiệm kim</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="money">Số tiền muốn ủng hộ:  (<span class="text-danger">*</span>)</label>
            <input type="text"  class="form-control money" id="money" name="money" placeholder="" required="">
            <small class="text-muted">Đơn vị: VNĐ</small>
          </div>
          <div class="col-md-6 mb-3">
            <label for="content-donation">Nội dung ủng hộ: </label>
            <input type="text" class="form-control" name="content_donation" id="content-donation" placeholder="">
          </div>
        </div>
        </div>
          <div id="address_component" class="hidden">
         <hr class="mb-4">
        <h4 class="mb-3">Địa chỉ nhận hàng quyên góp (Sách, vở, áo quần cũ)</h4>
        <div class="mb-3">
            <label for="artifacts">Nội dung ủng hộ hiện vật: </label>
            <input type="text" class="form-control" name="artifacts" id="artifacts" placeholder="Áo quần cũ, sách vở cũ, đồ chơi,...">
          </div>
        <div class="mb-3">
          <label for="phone">Số điện thoại liên hệ: </label>
          <input type="text"  pattern="(09|03|07|08|05)+([0-9]{8})" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" >
        </div>
        <div class="mb-3">
          <label for="address">Địa chỉ cụ thể: </label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Nội địa Đà Nẵng" >
        </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" name="redirect" type="submit">ỦNG HỘ</button>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#anonymous').click(function(event) {
    var checked=$(this).is(':checked');
    if(checked==true){
      $('#name').prop('readonly',true);
      $('#checked_anonymous').val(1);
    }else{
      $('#name').prop('readonly',false);
      $('#checked_anonymous').val(0);
    }
  });
</script>
@endsection


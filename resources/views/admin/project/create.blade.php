<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    function chooseFile(thumbnail){
        if(thumbnail.files && thumbnail.files[0]){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(thumbnail.files[0]);
        }

    }
    </script>
</head>
@extends('admin/dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý dự án</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('project')}}">Quản lý dự án</a></li>
              <li class="breadcrumb-item active">Thêm dự án</li>
            </ol>
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
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm dự án</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                 @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                                @if (session('status'))
                        <div class="alert container-fluid alert-success" role="alert">
                                {{session('status')}} <i id="close" class="fas fa-times float-right mt-1"></i>
                            </div>
                        @endif
              <form action="{{route('manager-project.store')}}" method="POST" id="quickForm" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="slug">Tên dự án (<span class="required">*</span>):</label>
                    <input type="text" name="name_project" onkeyup="ChangeToSlug()" class="form-control" id="slug" value="{{old('name_project')}}" placeholder="Name of project">
                  </div>
                  <div class="form-group">
                    <label for="convert_slug">Slug dự án (<span class="required">*</span>):</label>
                    <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="convert_slug" placeholder="Slug">
                  </div>
                  <div class="form-group ">
                    <label for="id_category">Danh mục (<span class="required">*</span>):</label>
                    <select class="custom-select" name="id_category" required="true">
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                            <label for="exampleInputEmail1">Ngày diễn ra chương trình (<span class="required">*</span>):</label>
                              <input type="date" id="date_action" class="form-control"  name="date_action" value="{{old('date_action')}}"  aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <input type="checkbox" class="ml-2" name="check_donation" id="check_donation"> <label for="check_donation"> Hoạt động có gây quỹ ?</label>
                  </div>
                  <div id="donation" class="hidden">
                  <div class="row" >
                    <div class="form-group col-md-12 col-sm-12">
                            <label for="donate_for">Ủng hộ cho:</label>
                            <input type="text" id="donate_for" class="form-control"  name="donate_for" value="{{old('donate_for')}}"  placeholder="Tên tổ chức, người được thụ hưởng">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                            <label for="target">Mục tiêu ủng hộ:</label>
                            <input type="text" id="target" class="form-control money"  name="target" value="{{old('target')}}"  aria-describedby="emailHelp" placeholder="VNĐ">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                       <label for="fund">Sử dụng quỹ nhóm:</label>
                            <input type="text" class="form-control money" id="fund" name="fund" value="{{old('fund')}}"  aria-describedby="emailHelp" placeholder="VNĐ">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                            <label for="phone">SĐT đơn vị được ủng hộ:</label>
                            <input type="tel" id="phone" class="form-control"  name="phone" value="{{old('phone')}}" pattern="(09|03|07|08|05)+([0-9]{8})"  placeholder="Số điện thoại">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                            <label for="link">Liên kết:</label>
                            <input type="text" id="link" class="form-control"  name="link" value="{{old('link')}}"  placeholder="facebook.com/username">
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="short_desc">Mô tả sơ lượt:</label>
                    <textarea class="form-control" id="short_desc" name="short_desc" rows="3" >{{old('short_desc')}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="editor">Mô tả (<span class="required">*</span>):</label>
                    <textarea class="form-control" id="editor" name="description" rows="5" resize="none">{{old('description')}}</textarea>
                  </div>
                  <div class="form-group col-md-4">
                    <label >Thumbnail (<span class="required">*</span>):</label>
                    <div><label for="thumbnail" class="thumbnail-btn"><i class="fas fa-upload"></i> Tải ảnh lên</label></div>
                    <input type="file" onchange="chooseFile(this)" id="thumbnail" name="thumbnail" class="form-control" >
                    <img src="{{asset("img/default.png")}}" width="auto" height="300px" id="image">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Trạng thái (<span class="required">*</span>):</label>
                    <select class="custom-select" name="active">
                      <option <?php echo old('active')==1? "selected" : ""?> value="<?php echo Config::get('constants.active.ACTIVE')?>">Kích hoạt</option>
                      <option <?php echo old('active')==0? "selected" : ""?> value="<?php echo Config::get('constants.active.NON_ACTIVE')?>">Không kích hoạt</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

      <script type="text/javascript">
    $('.today').attr('min', new Date().toISOString().split('T')[0])</script>
    <script type="text/javascript">
      $('#check_donation').click(function(){
        if($(this).is(':checked')){
          $('#donation').fadeIn();
          $('#donation').removeClass('hidden');
          $('#donate_for').val("");
          $('#target').val("");
          $('#fund').val("");
          $('#phone').val("");
          $('#link').val("");
        }else{
          $('#donation').fadeOut();
          $('#donation').addClass('hidden');
        }
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('body').on('change','#phone', function() {
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var mobile = $('#phone').val();
        if(mobile !==''){
            if (vnf_regex.test(mobile) == false)
            {
                alert('Số điện thoại của bạn không đúng định dạng!');
            }
        }else{
            alert('Bạn chưa điền số điện thoại!');
        }
    });
});
</script>



@endsection

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
            <h1>Quản lý Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{URL::to('slider')}}">Slider</a></li>
              <li class="breadcrumb-item active">Thêm Slider</li>
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
                <h3 class="card-title">Thêm Slider</h3>
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
              <form action="{{URL::to('slider/store')}}" method="POST" id="quickForm" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tên đại diện (<span class="required">*</span>):</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Name of project">
                  </div>
                  <div class="form-group">
                    <label for="tilte">Tiêu đề (<span class="required">*</span>):</label>
                    <input type="text" id="tilte" name="title" class="form-control" value="{{old('title')}}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-4">
                    <label >Ảnh tải lên (<span class="required">*</span>):</label>
                    <div><label for="thumbnail" class="thumbnail-btn"><i class="fas fa-upload"></i> Tải ảnh lên</label></div>
                    <input type="file" onchange="chooseFile(this)" id="thumbnail" name="image" class="form-control" >
                    <img src="{{asset("img/default.png")}}" width="auto" height="300px" id="image">
                  </div>
                     <div class="form-group">
                    <label for="tilte">Liên kết (<span class="required">*</span>):</label>
                    <input type="text" id="link" name="link" class="form-control" value="{{old('link')}}" placeholder="URL">
                  </div>
                  <div class="form-group">
                    <label for="editor">Mô tả:</label>
                    <textarea class="form-control" id="editor" name="description" rows="5" resize="none">{{old('description')}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="editor">Vị trí (<span class="required">*</span>):</label>

                    <select class="custom-select" name="position" required="true">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Trạng thái (<span class="required">*</span>):</label>
                    <select class="custom-select" name="active">
                      <option <?php echo old('active')==1? "selected" : ""?> value="<?php echo Config::get('constants.active.ACTIVE')?>">Kích hoạt</option>
                      <option <?php echo old('active')==0? "selected" : ""?> value="<?php echo Config::get('constants.active.NON_ACTIVE')?>">Không kích hoạt</option>
                    </select>
                  </div>
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
        }else{
          $('#donation').fadeOut();
          $('#donation').addClass('hidden');
        }
      });
    </script>
@endsection
